<?php

namespace App\Models;

use App\Models\Sucursal;
use App\Models\Localidad;
use App\Models\Sexo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model; //extiende de User
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\TatuadorTransformer; 

class Tatuador extends Model
{
    use SoftDeletes;
    public $transformer = TatuadorTransformer::class;

    const TATUADOR_DISPONIBLE = 'disponible';
    const TATUADOR_NO_DISPONIBLE = 'no disponible';



    protected $connection = 'mysql';
    protected $table      = 'tatuadors';
    protected $primaryKey = 'id';
    protected $fillable   = [
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

    public $timestamps=true;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sucursal(){

        return $this->belongsTo(Sucursal::class, 'sucursal_id', 'id');
    }

     public function localidad()
    {
        return $this->belongsTo(Localidad::class,'localidad_id','id');
    }
    public function sexo()
    {
        return $this->belongsTo(Sexo::class,'sexo_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function estaDisponible()
    {
        return $this->estado == Tatuador::TATUADOR_DISPONIBLE;
    }
}
