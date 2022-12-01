<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;


class Nominados extends Model implements Auditable
{
    use AuditableTrait;

    protected $table = 'nominados';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombres', 'apellidos', 'correo', 'estado', 'idtipos_documento', 'documento',
        'idpais', 'iddepartamento', 'idciudad', 'celular', 'fechanacimiento', 'idgenero',
        'iddepartamenton', 'idciudadn', 'viviendocali', 'telefono', 'direccion', 'barrio',
        'comuna', 'anombre', 'aparentesco', 'adocumento', 'aidtipos_documento', 'created_at', 'updated_at',
        'acelular', 'atelefono', 'foto', 'certificado'
    ];

    public function nominaciones() {
        return $this->hasMany(Nominacion::class, 'idnominado');
    }

    public function tipodocumento()
    {
        return $this->belongsTo(TiposDocumento::class, 'idtipos_documento');
    }

    public function genero(){
        return $this->belongsTo(Genero::class, 'idgenero');
    }

    public function estados(){
        return $this->belongsTo(Estado::class, 'estado');
    }

    public function archivos() {
        return $this->hasMany(Archivo::class, 'idmilitante');
    }

    public function pais(){
        return $this->belongsTo(Pais::class, 'idpais');
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'iddepartamento');
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class, 'idciudad');
    }

    public function getFullNameAttribute()
    {
        return ucwords("{$this->nombres} {$this->apellidos}");
    }
}
