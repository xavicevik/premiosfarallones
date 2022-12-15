<?php

namespace App\Exports;

use App\Models\Boleta;
use App\Models\Militante;
use App\Models\Nominacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NominacionesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $filtros = json_decode($this->request['filtros']);

        $nominados = Nominacion::join('nominados', 'nominaciones.idnominado', '=', 'nominados.id')
            ->leftJoin('categorias', 'nominaciones.idcategoria', '=', 'categorias.id')
            ->leftJoin('modalidades', 'nominaciones.idmodalidad', '=', 'modalidades.id')
            ->leftJoin('departamentos', 'nominados.iddepartamento', '=', 'departamentos.id')
            ->leftJoin('ciudades', 'nominados.idciudad', '=', 'ciudades.id')
            ->leftJoin('generos', 'nominados.idgenero', '=', 'generos.id')
            ->leftJoin('tipos_documentos', 'nominados.idtipos_documento', '=', 'tipos_documentos.id');

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

        return  $nominados->select(
            'tipos_documentos.nombre as Tipo_documento',
            'nominados.documento as Documento',
            'nominados.nombres as Nombres',
            'nominados.apellidos as Apellidos',
            'nominados.correo as Correo',
            'nominados.celular as Celular',
            'departamentos.nombre as Departamento',
            'ciudades.nombre as Ciudad',
            'nominados.fechanacimiento as Fech_nacimiento',
            'nominados.viviendocali as Tiempo_viviendo_Cali',
            'nominados.telefono as Teléfono',
            'generos.nombre as Género',
            'nominados.direccion as Dirección',
            'nominados.barrio as Barrio',
            'nominados.comuna as Comuna',
            'nominados.anombre as Acudiente_Nombre',
            'nominados.aparentesco as Acudiente_Parentesco',
            'nominados.adocumento as Acudiente_Documento',
            'nominados.acelular as Acudiente_Celular',
            'nominados.atelefono as Acudiente_Telefono',
            'nominaciones.anio as Año',
            'modalidades.nombre as Modalidad',
            'categorias.nombre as Categoría',
            'nominaciones.nombre as Nombre_competencia',
            'nominaciones.oro as Oro',
            'nominaciones.plata as Plata',
            'nominaciones.bronce as Bronce',
            'nominaciones.entidad as Entidad',
            'nominaciones.certificado as Certificado',
            'nominaciones.created_at as fecha_creacion',
            'nominaciones.updated_at as fecha_ultima_modificacion')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tipo_documento',
            'Documento',
            'Nombres',
            'Apellidos',
            'Correo',
            'Celular',
            'Departamento',
            'Ciudad',
            'Fech_nacimiento',
            'Tiempo_viviendo_Cali',
            'Teléfono',
            'Género',
            'Dirección',
            'Barrio',
            'Comuna',
            'Acudiente Nombre',
            'Acudiente Parentesco',
            'Acudiente Documento',
            'Acudiente Celular',
            'Acudiente Telefono',
            'Año',
            'Modalidad',
            'Categoría',
            'Nombre competencia',
            'Oro',
            'Plata',
            'Bronce',
            'Entidad',
            'Certificado',
            'Fecha_creacion',
            'Fecha_ultima_actualizacion'
        ];
    }
}
