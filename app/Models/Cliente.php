<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Localidad;
use App\Models\Sexo;
use App\Models\User;
use App\Transformers\ClienteTransformer; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    public $transformer = ClienteTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'dni',
        'nombre',
        'apellido',
        'email',
        'localidad_id',
        'user_id',
        'sexo_id'
    ];
    //protected fillable = [Dni Nombre Apellido Email Localidad Usuario Sexo];

    public $timestamps=true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function sexo()
    {
        return $this->belongsTo(Sexo::class,'sexo_id','id');
    
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function localidad()
    {
        return $this->belongsTo(Localidad::class,'localidad_id','id');
    }

}
