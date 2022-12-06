<?php

namespace App\Http\Controllers;

use App\Exports\ClientesExport;
use App\Exports\MilitantesExport;
use App\Exports\UsersExport;
use App\Imports\MilitantesImport;
use App\Models\Archivo;
use App\Models\Audits;
use App\Models\Cuentasclara;
use App\Models\Historial;
use App\Models\Imagen;
use App\Models\Militante;
use App\Models\Confcomision;
use App\Models\Nominacion;
use App\Models\Nominados;
use App\Models\Puntoventa;
use App\Models\Rifa;
use App\Models\Rol;
use App\Models\Tiposarchivo;
use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Image;
use Laravel\Jetstream\Jetstream;
use Maatwebsite\Excel\Facades\Excel;
use OwenIt\Auditing\Models\Audit;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Http;

class NominadoController extends Controller
{
    const canPorPagina = 5;
    const nuCreacion = 1;
    const nuModificacion = 2;
    const nuSancion = 3;
    const nuEliminacion = 4;
    const nuRenuncia = 5;
    const nuRemplazo = 6;
    const nuAprobacion = 7;
    const nuSolicitudcc = 9;
    const nuReposicioncc = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $filtros = json_decode($request->filtros);

        if ($request->has('sortBy') && $request->sortBy <> ''){
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'id';
        }

        if ($request->has('sortOrder') && $request->sortOrder <> ''){
            $sortOrder = $request->sortOrder;
        } else {
            $sortOrder = 'desc';
        }

        $nominados = Nominacion::orderBy($sortBy, $sortOrder)
                                ->with('nominado')
                                ->with('modalidad')
                                ->with('categoria');

        if (!is_null($filtros)) {
            if (!is_null($filtros->idmodalidad) && $filtros->idmodalidad <> '-') {
                $nominados = $nominados->where('idmodalidad', $filtros->idmodalidad);
            }
            if (!is_null($filtros->idcategoria) && $filtros->idcategoria <> '-') {
                $nominados = $nominados->where('idcategoria', $filtros->idcategoria);
            }
            if (!is_null($filtros->anio) && $filtros->anio <> '') {
                $nominados = $nominados->where('anio', $filtros->anio);
            }

            if ((!is_null($filtros->documento) && $filtros->documento <> '') ||
                (!is_null($filtros->nombre) && $filtros->nombre <> '') ||
                (!is_null($filtros->idgenero) && $filtros->idgenero <> '-') ){

                $nominados = $nominados->join('nominados', 'nominados.id', '=', 'nominaciones.idnominado')
                    ->select('nominaciones.*');

                if (!is_null($filtros->documento) && $filtros->documento <> '') {
                    $nominados = $nominados->where('nominados.documento', 'like', '%'.$filtros->documento.'%');
                }

                if (!is_null($filtros->nombre) && $filtros->nombre <> '') {
                    $nominados = $nominados->where('nominados.nombres', 'like', '%'.$filtros->nombre.'%');
                }
                if (!is_null($filtros->idgenero) && $filtros->idgenero <> '-') {
                    $nominados = $nominados->where('nominados.idgenero', $filtros->idgenero);
                }
            }
        }

        $nominados = $nominados->paginate(self::canPorPagina);

        if ($request->has('ispage') && $request->ispage){
            return ['nominados' => $nominados];
        } else {

            return Inertia::render('Juegosfarallones/Nominados', ['nominados' => $nominados, '_token' => csrf_token()]);
        }
    }

    public function indexAuditoria(Request $request)
    {
        $buscar = $request->buscar;
        $filtros = json_decode($request->filtros);

        if ($request->has('sortBy') && $request->sortBy <> ''){
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'id';
        }

        if ($request->has('sortOrder') && $request->sortOrder <> ''){
            $sortOrder = $request->sortOrder;
        } else {
            $sortOrder = 'desc';
        }

        $auditorias = Audit::orderBy($sortBy, $sortOrder)
                             ->join('users', 'user_id', 'users.id')
                             ->join('militantes', 'auditable_id', 'militantes.id')
                             ->select('audits.*', 'users.nombre AS nombreusuario', 'users.apellido AS apellidousuario',
                                      'militantes.nombre AS nombremilitante', 'militantes.apellido AS apellidomilitante');

        if ($buscar <> '') {
            $auditorias = $auditorias
                ->where('nombre', 'like', '%'. $buscar . '%')
                ->orWhere('apellido', 'like', '%'. $buscar . '%')
                ->orWhere('email', 'like', '%'. $buscar . '%')
                ->orWhere('documento', 'like', '%'. $buscar . '%');
        }

        if (!is_null($filtros)) {
            if(!is_null($filtros->fechainicio) && $filtros->fechainicio <> '' && $filtros->fechainicio <> null) {
                $auditorias = $auditorias->where('audits.updated_at', '>=', $filtros->fechainicio);
            }
            if(!is_null($filtros->fechafin) && $filtros->fechafin <> '' && $filtros->fechafin <> null) {
                $auditorias = $auditorias->where('audits.updated_at', '<=', $filtros->fechafin);
            }
            if(!is_null($filtros->usuario) && $filtros->usuario <> '-') {
                $auditorias = $auditorias->join('users as t1', 'audits.user_id', '=', 't1.id')
                    ->where('t1.nombre', 'like', '%'.$filtros->usuario.'%')
                    ->orWhere('t1.apellido', 'like', '%'.$filtros->usuario.'%')
                    ->orWhere('t1.documento', 'like', '%'.$filtros->usuario.'%');
            }
            if(!is_null($filtros->militante) && $filtros->militante <> '-') {
                $auditorias = $auditorias->join('militantes as t2', 'audits.auditable_id', '=', 't2.id')
                    ->where('t2.nombre', 'like', '%'.$filtros->militante.'%')
                    ->orWhere('t2.apellido', 'like', '%'.$filtros->militante.'%')
                    ->orWhere('t2.documento', 'like', '%'.$filtros->militante.'%');
            }
            if (!is_null($filtros->evento) && $filtros->evento <> '-') {
                $auditorias = $auditorias->where('event', $filtros->evento);
            }
        }

        $auditorias = $auditorias->paginate(self::canPorPagina);

        if ($request->has('ispage') && $request->ispage){
            return ['auditorias' => $auditorias];
        } else {
            return Inertia::render('Militantes/Indexauditoria', ['auditorias' => $auditorias, '_token' => csrf_token()]);
        }
    }

    public function getArchivos(Request $request)
    {
        $archivos =  Archivo::where('idmilitante', $request->idmilitante)
                              ->with('tipoarchivo')
                              ->get();

        return ['archivos' => $archivos];
    }

    public function archivoupload(Request $request) {
        try{
            DB::beginTransaction();

            $allowedfileExtension = ['pdf','jpg','png','docx','ppt', 'ppt', 'pptx','txt','csv' , 'doc', 'xls', 'xlsx'];
            $codigo = 1;

            if(isset($request->file)){
                $file = $request->file;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if($check) {
                    $archivo = new Archivo();
                    $archivo->idtipoarchivo = $request->idtipoarchivo;
                    $archivo->idmilitante = $request->idmilitante;
                    $archivo->nombre = $filename;

                    $archivo->extension = $extension;
                    $filename = time(). '_' . $filename;
                    $path = $file->storeAs('archivos', $filename);

                    $archivo->url = Storage::url($path);

                    $archivo->tamaño = $file->getSize();
                    $archivo->save();
                } else {
                    $codigo = -1;
                    $mensaje = 'La extensión de al menos un archivo no es permitida';
                }
            }

            if ($codigo == -1) {
                DB::rollBack();
            } else {
                DB::commit();
            }

            $mensaje = 'Archivo actualizado';
        } catch (Throwable $e){
            DB::rollBack();

            $codigo = -1;
            $mensaje = 'Se ha presentado un error';
        }
        return redirect()->back()->with('message', $mensaje);
        //return ['codigo' => $codigo, 'mensaje' => $mensaje];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $observaciones = 'Se ha creado el nominado';
        /*
        Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'documento' => ['required', 'unique:militantes', 'string', 'max:255'],
            'idtipos_documento' => 'required|numeric|gt:0',
            'iddepartamento' => 'required|numeric|gt:0',
            'idciudad' => 'required|numeric|gt:0',
            'idgenero' => 'required|numeric',
        ],
            [
                'nombre.required' => 'Ingrese el nombre',
                'apellido.required' => 'Ingrese el apellido',
                'correo.required' => 'Ingrese el email',
                'celular.required' => 'Ingrese el teléfono celular',
                'documento.required' => 'Ingrese el número de identificacion',
                'documento.unique' => 'El documento ya existe',
                'idtipos_documento.numeric' => 'Seleccione un tipo de documento',
                'iddepartamento.numeric' => 'Seleccione un Departamento',
                'idciudad.numeric' => 'Seleccione una ciudad',
                'idgenero.numeric' => 'Seleccione un género',
                'idgrupoetnico.numeric' => 'Seleccione un grupo étnico',
            ])->validate();
*/
        $nominado = Nominados::create($request->all());
        $nominado->saveOrFail();

        return $observaciones;
    }

    public function storenominacion(Request $request)
    {
        try{
            DB::beginTransaction();

            $mensaje = 'Se ha creado la nominación';

            $nominado = Nominacion::create($request->all());
            $nominado->saveOrFail();

            $allowedfileExtension = ['pdf'];
            $codigo = 1;

            if(isset($request->file)){
                $file = $request->file;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if($check) {
                    $filename = time(). '_' . $filename;
                    $path = $file->storeAs('archivos', $filename);
                    $nominado->certificado = Storage::url($path);
                    $nominado->save();
                } else {
                    $codigo = -1;
                    $mensaje = 'La extensión de al menos un archivo no es permitida';
                }
            }

            if ($codigo == -1) {
                DB::rollBack();
            } else {
                DB::commit();
            }

            $mensaje = 'Archivo actualizado';
        } catch (Throwable $e){
            DB::rollBack();

            $codigo = -1;
            $mensaje = 'Se ha presentado un error';
        }

        return $mensaje;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nominados $nominado)
    {
        try{
            DB::beginTransaction();
            $observaciones = 'El nominado ha sido actualizado';

            $nominado->update($request->all());
            DB::commit();

            return $nominado;

        } catch (Throwable $e){
            DB::rollBack();

            return $e;
        }
    }

    public function updateEstado(Request $request, Militante $militante)
    {
        try{
            DB::beginTransaction();

            $mensajeserror = [];

            if ($request->tipo == 'sancionar') {
                $tipo = self::nuSancion;
                $estado = 11;
            } elseif ($request->tipo == 'aprobar') {
                $tipo = self::nuAprobacion;
                $estado = 1;

                if ($militante->nombre == '' || is_null($militante->nombre)) {
                    $mensajeserror[] = 'El nombre no puede estar vacio';
                }
                if ($militante->apellido == '' || is_null($militante->apellido)) {
                    $mensajeserror[] = 'El apellido no puede estar vacio';
                }
                if ($militante->documento == '' || is_null($militante->documento)) {
                    $mensajeserror[] = 'El documento no puede estar vacio';
                }
                if ($militante->email == '' || is_null($militante->email)) {
                    $mensajeserror[] = 'El correo no puede estar vacio';
                }
                $valFormulario = Archivo::where('idmilitante', $militante->id)
                                         ->where('idtipoarchivo', 1)
                                         ->first();
                if (!$valFormulario) {
                    $mensajeserror[] = 'Debe incluir el formulario de inscripción';
                }
                /*
                $valCertificado = Archivo::where('idmilitante', $militante->id)
                                        ->where('idtipoarchivo', 8)
                                        ->first();
                if (!$valCertificado) {
                    $mensajeserror[] = 'Debe realizar el curso y aprobar la evaluación';
                }
                */

            } elseif ($request->tipo == 'renunciar') {
                $tipo = self::nuRenuncia;
                $estado = 10;
            }

            if (sizeof($mensajeserror) == 0) {
                $militante->estado = $estado;
                $militante->save();
                $this->setHistorial($militante->id, $tipo, $request->observaciones);
                DB::commit();

                if($request->tipo == 'aprobar') {
                    $this->getCertificado($militante);
                }
                $estado = true;
            } else {
                DB::rollBack();
                $estado = false;
            }

            return ['estado' => $estado, 'mensajeserror' => $mensajeserror];
            //return redirect()->back()->with('message', 'Usuario modificado satisfactoriamente');

        } catch (Throwable $e){
            DB::rollBack();

            return redirect()->back()->with('message', 'Error');
        }
    }

    public function ccupdate(Request $request, Militante $militante)
    {
        try{
            DB::beginTransaction();

            if ($request->tipo == 'solicitar') {
                $tipo = self::nuSolicitudcc;
                $estado = 3;
                $militante->cccreated_at = $request->cccreated_at;
            } elseif ($request->tipo == 'reposicion') {
                $tipo = self::nuReposicioncc;
                $estado = 1;
                $militante->ccupdated_at = $request->ccupdated_at;
                $militante->ccreposicion = $request->ccreposicion;

            }

            $militante->ccestado = $estado;
            $militante->ccobservaciones = $militante->ccobservaciones." \n".$request->ccobservaciones;
            $militante->save();
            $this->setHistorial($militante->id, $tipo, $request->ccobservaciones);
            DB::commit();

            return redirect()->back()->with('message', 'Usuario modificado satisfactoriamente');

        } catch (Throwable $e){
            DB::rollBack();

            return redirect()->back()->with('message', 'Erro');
        }
    }

    public function registroHistorial(Request $request) {
        $this->setHistorial($request->id, $request->tipo, $request->observaciones);

        return redirect()->back()->with('message', 'Usuario modificado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Militante::where('id', $request->id)->first();

        $user->estado = 0;
        $user->save();

        return redirect()->back()->with('message', 'El Militante ha renunciado satisfactoriamente');
    }

    public function MilitantesExport(Request $request)
    {
        return Excel::download(new MilitantesExport($request), 'militantes.xlsx');
    }

    public function UsersExport(Request $request)
    {
        return Excel::download(new UsersExport($request), 'users.xlsx');
    }

    public function ClientesExport(Request $request)
    {
        return Excel::download(new ClientesExport($request), 'clientes.xlsx');
    }

    private function setRenuncia(Militante $renuncia) {
        $remplazo = Militante::where('id', $renuncia->idremplazo)->first();
        $remplazo->avalado = $renuncia->avalado;
        $remplazo->idcorporacion = $renuncia->idcorporacion;
        $remplazo->periodo = $renuncia->periodo;
        $remplazo->electo = $renuncia->electo;
        $remplazo->votos = $renuncia->votos;
        $remplazo->coalicion = $renuncia->coalicion;
        $remplazo->nombrecoalicion = $renuncia->nombrecoalicion;
        $remplazo->observaciones = $remplazo->observaciones.' - Remplazo de '.$renuncia->documento;
        $remplazo->save();
        $this->setHistorial($remplazo->id, self::nuRemplazo, 'Remplazo');

        //$renuncia->avalado = 0;
        $renuncia->idcorporacion = null;
        $renuncia->periodo = null;
        $renuncia->electo = 0;
        $renuncia->votos = null;
        $renuncia->coalicion = 0;
        $renuncia->nombrecoalicion = null;
        $renuncia->save();
        $this->setHistorial($renuncia->id, self::nuRenuncia, 'Renunció');
    }

    public static function setHistorial(int $idmilitante, int $idtipohistorial, string $observaciones = null, int $userid = null) {
        $historial = new Historial();
        $historial->idmilitante = $idmilitante;
        $historial->idtipohistorial = $idtipohistorial;
        $historial->idusuario = Auth::user()?Auth::user()->id:$userid;
        $historial->observaciones = $observaciones;
        $historial->save();
    }

    public static function getCertificado(Militante $militante) {
        $url = url('storage/img/plantilla.jpg');

        $nombre = $militante->full_name;
        $cedula = $militante->documento;
        $dia = Carbon::create($militante->fechacreacion)->day;
        $mes = Carbon::create($militante->fechacreacion)->monthName;
        $anio = Carbon::create($militante->fechacreacion)->year;

        switch($militante->idgenero) {
            case 1:
                $genero = 'El Señor';
                break;
            case 2:
                $genero = 'La Señora';
                break;
            default:
                $genero = 'El Señor(a)';
        }

        $text  = "$genero $nombre, identificaddo con la cedula de ciudadanía ";
        $text2 = "No. $cedula, se encuentra registrado como militante del partido ";
        $text3 = "Colombia Renaciente, desde el $dia, de $mes, de $anio.";

        $data = [
            'text' => $text.$text2.$text3,
            'url' => $url
        ];

        $filename = 'certificado_'.$militante->id.$militante->documento.'.pdf';
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf.certificado', $data);

        $output = $pdf->output();
        file_put_contents(public_path('storage').'/pdf/'.$filename, $output, FILE_APPEND);

        $archivo = new Archivo();
        $archivo->idtipoarchivo = 4;
        $archivo->idmilitante = $militante->id;
        $archivo->nombre = $filename;
        $archivo->extension = 'pdf';
        $archivo->url = url('storage/pdf').'/'.$filename;
        $archivo->tamaño = 1;//filesize($archivo->url);
        $archivo->save();

    }

    public static function importar(Request $request) {
        try {
            $id = Carbon::now()->unix();
            session([ 'import' => $id ]);

            Excel::queueImport(new MilitantesImport($id, Auth::user(), $request->file('file')->getClientOriginalName()), $request->file('file')->store('temp'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $fallas = $e->failures();

            foreach ($fallas as $falla) {
                $falla->row(); // fila en la que ocurrió el error
                $falla->attribute(); // el número de columna o la "llave" de la columna
                $falla->errors(); // Errores de las validaciones de laravel
                $falla->values(); // Valores de la fila en la que ocurrió el error.
            }
        }

        return redirect()->back()->with('message', 'Archivo importado correctamente');
    }

    public function status()
    {
        $id = session('import');

        return response([
            'start_date' => (string) cache("start_date_$id"),
            'end_date' => (string) cache("end_date_$id"),
            'current_row' => (int) cache("current_row_$id"),
            'total_rows' => (int) cache("total_rows_$id"),
            'statusfinal' => (string) cache("statusfinal_$id"),
        ]);
    }

    public function gettotal() {
        $total = Nominacion::all()->count();

        return ['total' => $total];
    }


}
