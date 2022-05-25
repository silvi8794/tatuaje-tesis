<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\SexoTransformer; 

class Sexo extends Model
{
    use SoftDeletes; 

    public $transformer = SexoTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'sexos';
    protected $primaryKey = 'id';
    protected $fillable   = ['nombre'];  //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     public function tatuajes()
    {

        return $this->belongsToMany(Tatuaje::class,'sexo_tatuajes','sexo_id','tatuaje_id');
    }
}
