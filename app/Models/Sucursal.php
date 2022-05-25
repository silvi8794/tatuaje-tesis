<?php

namespace App\Models;

use App\Models\Localidad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\SucursalTransformer; 

class Sucursal extends Model
{
    use SoftDeletes; 
    public $transformer = SucursalTransformer::class;
    protected $connection = 'mysql';
    protected $table      = 'sucursals';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'nombre',
        'direccion',
        'horario_inicio',
        'horario_fin',
        'localidad_id',
        
        //
        ];
        //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localidad(){

    	return $this->belongsTo(Localidad::class,'localidad_id','id');
	}
}
