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

        $nominaciones = Nominacion::join('nominados', 'nominaciones.idnominado', '=', 'nominados.id')
            ->leftJoin('categorias', 'nominaciones.idcategoria', '=', 'categorias.id')
            ->leftJoin('modalidades', 'nominaciones.idmodalidad', '=', 'modalidades.id')
            ->leftJoin('departamentos', 'nominados.iddepartamento', '=', 'departamentos.id')
            ->leftJoin('ciudades', 'nominados.idciudad', '=', 'ciudades.id')
            ->leftJoin('generos', 'nominados.idgenero', '=', 'generos.id')
            ->leftJoin('tipos_documentos', 'nominados.idtipos_documento', '=', 'tipos_documentos.id');

        /*
        if (!is_null($filtros)) {
            if(!is_null($filtros->fechainicio) && $filtros->fechainicio <> '' && $filtros->fechainicio <> null) {
                 $nominaciones =  $nominaciones->where('nominaciones.updated_at', '>=', $filtros->fechainicio);
            }
            if(!is_null($filtros->fechafin) && $filtros->fechafin <> '' && $filtros->fechafin <> null) {
                 $nominaciones =  $nominaciones->where('nominaciones.updated_at', '<=', $filtros->fechafin);
            }
            if (!is_null($filtros->documento) && $filtros->documento <> '') {
                 $nominaciones =  $nominaciones->where('nominaciones.documento', 'like', '%' . $filtros->documento . '%');
            }
            if (!is_null($filtros->nombre) && $filtros->nombre <> '') {
                 $nominaciones =  $nominaciones->where('nominaciones.nombres', 'like', '%' . $filtros->nombre . '%')
                    ->orWhere('nominaciones.apellidos', 'like', '%' . $filtros->nombre . '%');
            }
            if (!is_null($filtros->email) && $filtros->email <> '') {
                 $nominaciones =  $nominaciones->where('nominaciones.correo', 'like', '%' . $filtros->email . '%');
            }
            if (!is_null($filtros->movil) && $filtros->movil <> '') {
                 $nominaciones =  $nominaciones->where('nominaciones.celular', 'like', '%' . $filtros->movil . '%');
            }
            if (!is_null($filtros->idinscripcion) && $filtros->idcategoria <> '-' && $filtros->idcategoria <> 0) {
                 $nominaciones =  $nominaciones->where('nominaciones.idcategoria', $filtros->idcategoria);
            }
            if (!is_null($filtros->idgenero) && $filtros->idgenero <> '-' && $filtros->idgenero <> 0) {
                 $nominaciones =  $nominaciones->where('nominado.idgenero', $filtros->idgenero);
            }
            if (!is_null($filtros->idgrupoetnico) && $filtros->idgrupoetnico <> '-' && $filtros->idgrupoetnico <> 0) {
                 $nominaciones =  $nominaciones->where('militantes.idgrupoetnico', $filtros->idgrupoetnico);
            }
            if (!is_null($filtros->idcorporacion) && $filtros->idcorporacion <> '-' && $filtros->idcorporacion <> 0 && $filtros->idcorporacion <> null) {
                 $nominaciones =  $nominaciones->where('militantes.idcorporacion', $filtros->idcorporacion);
            }
            if (!is_null($filtros->lider) && $filtros->lider <> '' && $filtros->lider <> '-') {
                 $nominaciones =  $nominaciones->where('militantes.lider', $filtros->lider);
            }
            if (!is_null($filtros->avalado) && $filtros->avalado <> '' && $filtros->avalado <> '-') {
                 $nominaciones =  $nominaciones->where('militantes.avalado', $filtros->avalado);
            }
            if (!is_null($filtros->electo) && $filtros->electo <> '' && $filtros->electo <> '-') {
                 $nominaciones =  $nominaciones->where('militantes.electo', $filtros->electo);
            }
            if (!is_null($filtros->estado) && $filtros->estado <> '' && $filtros->estado <> '-') {
                 $nominaciones =  $nominaciones->where('militantes.estado', $filtros->estado);
            }
            if (!is_null($filtros->aportes) && $filtros->aportes <> '' && $filtros->aportes <> '-') {
                if ($filtros->aportes == 1) {
                     $nominaciones =  $nominaciones->where('militantes.aportes', '>', $filtros->aportes);
                }
            }
        }
        */

        return  $nominaciones->select(
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
            'Certificado',
            'Fecha_creacion',
            'Fecha_ultima_actualizacion'
        ];
    }
}
