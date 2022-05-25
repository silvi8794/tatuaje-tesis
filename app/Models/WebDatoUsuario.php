<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use App\Models\Sexo;
use App\Models\Localidad;
use App\Models\Sucursal;

class WebDatoUsuario extends Model
{
    use SoftDeletes;
    protected $table = "tatuadors";
    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'email',
        'especialidad',
        'estado',
        'sucursal_id',
        'localidad_id',
        'sexo_id',
        'user_id'
    ];


    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function sexo()
    {
        return $this->hasOne(Sexo::class, 'id', 'sexo_id');
    }
    public function localidad()
    {
        return $this->hasOne(Localidad::class, 'id', 'localidad_id');
    }
    public function sucursal()
    {
        return $this->hasOne(Sucursal::class, 'id', 'sucursal_id');
    }
    public function reserva()
    {
        return $this->hasMany(Reserva::class,  'tatuador_id', 'id');
    }
}
