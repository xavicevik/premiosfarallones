<?php

namespace App\Imports;

use App\Http\Controllers\MilitanteController;
use App\Models\Boleta;
use App\Models\Importstatus;
use App\Models\Militante;
use App\Models\NumeroReservado;
use App\Models\Rol;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\OutputStyle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\Event;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\ImportFailed;
use function PHPUnit\Framework\isNull;

class MilitantesImport implements OnEachRow, SkipsOnFailure, ShouldQueue, SkipsOnError, SkipsEmptyRows, WithEvents, WithHeadingRow, WithValidation, WithChunkReading
{
    public $id, $importedBy, $archivo, $finalstate;

    public function __construct(int $id, User $importedBy, String $archivo)
    {
        ini_set('max_execution_time', 1200);
        $this->id = $id;
        $this->importedBy = $importedBy;
        $this->archivo = $archivo;
        $this->finalstate = 1;
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function(ImportFailed $event) {
                //$this->importedBy->notify(new ImportHasFailedNotification);
                $status = new Importstatus();
                $status->estado = 0;
                $status->archivo = $this->archivo;
                $status->mensaje = 'Error importando el archivo - '.$event->e->getMessage();
                $status->documento = $this->id;
                $status->save();
                $this->finalstate = 0;
                cache()->forever("statusfinal_{$this->id}", $status->mensaje);
                cache(["end_date_{$this->id}" => Carbon::now()->format('d/m/Y H:i:s')], Carbon::now()->addMinute());
            },
            BeforeImport::class => function (BeforeImport $event) {
                $totalRows = $event->getReader()->getTotalRows();
                if (filled($totalRows)) {
                    cache(["statusfinal_{$this->id}" => 'Inicio']);
                    cache()->forever("total_rows_{$this->id}", array_values($totalRows)[0]);
                    cache()->forever("start_date_{$this->id}", Carbon::now()->format('d/m/Y H:i:s'));
                }
            },
            AfterImport::class => function (AfterImport $event) {
                if ($this->finalstate == 0) {
                    // Error importando
                    cache(["statusfinal_{$this->id}" => 'Error']);
                } else {
                    cache(["statusfinal_{$this->id}" => 'Exito']);
                }
                cache(["end_date_{$this->id}" => Carbon::now()->format('d/m/Y H:i:s')], Carbon::now()->addMinute());
            },
        ];
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = array_map('trim', $row->toArray());
        cache()->forever("current_row_{$this->id}", $rowIndex);

        $militante = null;
        if ($row['documento'] != '' && $row['documento'] != null) {
            $militante = Militante::where('documento', $row['documento'])
                                   ->first();
        } elseif ($row['correo'] != '' && $row['correo'] != null) {
            $militante = Militante::where('email', $row['correo'])
                ->first();
        } elseif ($row['celular'] != '' && $row['celular'] != null) {
            $militante = Militante::where('movil', $row['celular'])
                ->first();
        }

        if (is_null($militante)) {
            try{
                DB::beginTransaction();
                $militante = new Militante();
                $militante->fechaingreso = $row['fecha_de_ingreso']?Carbon::createFromFormat('m/d/Y', $row['fecha_de_ingreso'])->format('Y-m-d'):null;
                $militante->idinscripcion = $row['id_inscripcion'];
                $militante->iddepartamento = $row['id_departamento']?$row['id_departamento']:null;
                $militante->idtipos_documento = $row['idtipos_documento']?$row['idtipos_documento']:null;

                $militante->idciudad = $row['id_ciudad']?$row['id_ciudad']:null;
                $militante->documento = $row['documento'];
                $militante->fechanacimiento = $row['fecha_de_nacimiento']?Carbon::createFromFormat('m/d/Y', $row['fecha_de_nacimiento'])->format('Y-m-d'):null;
                $militante->movil = $row['celular'];
                $militante->email = $row['correo'];
                $militante->direccion = $row['direccion'];
                $militante->nombre = $row['nombre'];
                $militante->apellido = $row['apellido'];

                $militante->avalado = $row['avalado'];
                $militante->idcorporacion = $row['idcorporacion']?$row['idcorporacion']:null;
                $militante->idgenero  = $row['idgenero']?$row['idgenero']:null;
                $militante->renuncio = $row['renuncio']?$row['renuncio']:null;
                $militante->fecharenuncia = $row['fecharenuncia']?Carbon::createFromFormat('m/d/Y', $row['fecharenuncia'])->format('Y-m-d'):null;
                $militante->coalicion = $row['coalicion']?$row['coalicion']:null;
                $militante->nombrecoalicion = $row['nombrecoalicion'];
                $militante->idgrupoetnico  = $row['idgrupoetnico']?$row['idgrupoetnico']:null;
                $militante->electo  = $row['electo']?$row['electo']:null;
                $militante->votos  = $row['votos']?$row['votos']:null;

                $militante->username = $row['documento'];
                $militante->idpais = 1;
                $militante->observaciones = 'Importado'.$row['observaciones']?"\n".$row['observaciones']:'';

                $militante->password = Hash::make($militante->documento);
                $militante->estado = $militante->avalado?1:3;
                $militante->changedpassword = null;
                $militante->save();
                $rol = Rol::where('id', 3)->first();
                $militante->assignRole($rol->nombre);
                MilitanteController::setHistorial($militante->id, 1, $militante->observaciones, $this->importedBy->id);
                DB::commit();

            } catch (Throwable $e){
                DB::rollBack();
            }
        } else {
            try{
                DB::beginTransaction();
                $militante->fechaingreso = $row['fecha_de_ingreso']?Carbon::createFromFormat('m/d/Y', $row['fecha_de_ingreso'])->format('Y-m-d'):null;
                $militante->idinscripcion = $row['id_inscripcion']?$row['id_inscripcion']:$militante->idinscripcion;
                $militante->iddepartamento = $row['id_departamento']?$row['id_departamento']:$militante->iddepartamento;
                $militante->idtipos_documento = $row['idtipos_documento']?$row['idtipos_documento']:$militante->idtipos_documento;

                $militante->idciudad = $row['id_ciudad']?$row['id_ciudad']:$militante->idciudad;
                $militante->documento = $row['documento']?$row['documento']:$militante->documento;
                $militante->fechanacimiento = $row['fecha_de_nacimiento']?Carbon::createFromFormat('m/d/Y', $row['fecha_de_nacimiento'])->format('Y-m-d'):$militante->fechanacimiento;
                $militante->movil = $row['celular']?$row['celular']:$militante->movil;
                $militante->email = $row['correo']?$row['correo']:$militante->email;
                $militante->direccion = $row['direccion']?$row['direccion']:$militante->direccion;
                $militante->nombre = $row['nombre']?$row['nombre']:$militante->nombre;
                $militante->apellido = $row['apellido']?$row['apellido']:$militante->apellido;

                $militante->avalado = $row['avalado']?$row['avalado']:$militante->avalado;
                $militante->idcorporacion = $row['idcorporacion']?$row['idcorporacion']:$militante->idcorporacion;
                $militante->idgenero  = $row['idgenero']?$row['idgenero']:$militante->idgenero;
                $militante->renuncio = $row['renuncio']?$row['renuncio']:$militante->renuncio;
                $militante->fecharenuncia = $row['fecharenuncia']?Carbon::createFromFormat('m/d/Y', $row['fecharenuncia'])->format('Y-m-d'):$militante->fecharenuncia;
                $militante->coalicion = $row['coalicion']?$row['coalicion']:$militante->coalicion;
                $militante->nombrecoalicion = $row['nombrecoalicion']?$row['nombrecoalicion']:$militante->nombrecoalicion;
                $militante->idgrupoetnico  = $row['idgrupoetnico']?$row['idgrupoetnico']:$militante->idgrupoetnico;
                $militante->electo  = $row['electo']?$row['electo']:$militante->electo;
                $militante->votos  = $row['votos']?$row['votos']:$militante->votos;

                $militante->username = $row['documento']?$militante->username:$militante->username;
                $militante->idpais = 1;
                $militante->observaciones = 'Importado Modificado'.$row['observaciones']?"\n".$row['observaciones']:'';

                $militante->password = Hash::make($militante->documento);
                $militante->estado = $militante->avalado?1:3;
                $militante->changedpassword = null;
                $militante->save();
                MilitanteController::setHistorial($militante->id, 1, $militante->observaciones, $this->importedBy->id);
                DB::commit();

            } catch (Throwable $e){
                DB::rollBack();
            }
        }

        return $militante;
    }

    public function rules() : array
    {
        return [
            'fecha_de_ingreso' => 'nullable|regex:/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})/',
            'id_inscripcion' => 'nullable|numeric',
            'id_departamento' => 'nullable|numeric',
            'id_ciudad' => 'nullable|numeric',

            //'cedula' => 'nullable|string|numeric',
            //'fecha_de_nacimiento' => 'nullable|date_format:m/d/Y', //'nullable|regex:/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})/',
            //'nombre_completo' => 'nullable|string',
            //'celular' => 'nullable|numeric',
            //'correo_electronico' => 'nullable|string',
            //'direccion' => 'nullable|string'
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        dd($failures);
        $status = new Importstatus();
        $status->estado = 0;
        $status->archivo = $this->archivo;
        $status->mensaje = 'Failure importando el archivo '.$failures;
        $status->save();
        $this->finalstate = 0;
        //return $failures;
    }

    public function onError(\Throwable $e)
    {
        dd($e);
        $status = new Importstatus();
        $status->estado = 0;
        $status->archivo = $this->archivo;
        $status->mensaje = 'Error importando el archivo '.$e;
        $status->save();
        $this->finalstate = 0;
        //return $e;
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

}
