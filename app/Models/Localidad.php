<?php

namespace App\Models;

use App\Models\Provincia;
use App\Transformers\LocalidadTransformer; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localidad extends Model
{
    use SoftDeletes; 

   	public $transformer = LocalidadTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'localidads';
    protected $primaryKey= 'id';
    protected $fillable   = ['nombre','provincia_id' ]; 
    //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function provincia(){
		
		return $this->belongsTo(Provincia::class,'provincia_id','id');
    }
}
