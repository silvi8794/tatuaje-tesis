<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Localidad;
use App\Models\Sexo;
use App\User;

use App\Transformers\AdministradorTransformer; 

class Administrador extends Model
{
    use SoftDeletes; 

    public $transformer = AdministradorTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'administradors';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'dni',
        'nombre',
        'apellido',
        'email',
        'estado',
        'localidad_id',
        'user_id',
        'sexo_id'
    ];

    public $timestamps=true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
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
}
