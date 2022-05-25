<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Tatuaje;
use App\Models\Tatuador;
use App\Models\Administrador;
use App\Models\TipoUser;

use App\Transformers\UserTransformer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use Notifiable, SoftDeletes;
    public $transformer = UserTransformer::class;

     protected $connection = 'mysql';
     protected $table      = 'users';
     protected $primaryKey = 'id';

    const usuario_verificado = '1';
    const usuario_no_verificado = '0';

    const usuario_administrador = 'true';
    const usuario_regular = 'false';

    protected $dates = ['deleted_at'];



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password',
        'verified',
        'verification_token',
        'admin',
        'tipouser_id',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        //'verification_token',
    ];

    public function esVerificado()
    {
        return $this->verified == User::usuario_verificado;
    }

    public function esAdministrador()
    {
        return $this->admin == User::usuario_administrador;
    }

    public static function generarVerificationToken()
    {
        return str_random(40);
    }

    public function tipouser(){

        return $this->belongsTo(TipoUser::class,'tipouser_id','id');
    }

    public function cliente(){

        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function tatuador(){

        return $this->belongsTo(Tatuador::class,'tatuador_id','id');
    }
    public function administrador(){

        return $this->belongsTo(Administrador::class,'administrador_id','id');
    }
}
