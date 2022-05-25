<?php

namespace App\Models;

use App\Transformers\ProvinciaTransformer; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use SoftDeletes; 
    public $transformer = ProvinciaTransformer::class;
    protected $connection = 'mysql';
    protected $table      = 'provincias';
    protected $primaryKey= 'id';
    protected $fillable   = ['nombre']; //
    
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    public function localidades(){

    return $this->hasMany(Localidad::class);
	
	}
}
