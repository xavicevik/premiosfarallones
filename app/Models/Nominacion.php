<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominacion extends Model
{
    protected $table = 'nominaciones';
    protected $fillable =[
        'nombre',
        'idnominado',
        'anio',
        'certificado',
        'idmodalidad',
        'idcategoria',
        'oro',
        'plata',
        'bronce',
    ];

    public function nominado(){
        return $this->belongsTo(Nominados::class, 'idnominado');
    }
    public function modalidad(){
        return $this->belongsTo(Modalidades::class, 'idmodalidad');
    }
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'idcategoria');
    }

}
