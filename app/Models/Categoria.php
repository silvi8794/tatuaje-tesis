<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tatuaje;
use App\Transformers\CategoriaTransformer;

class Categoria extends Model
{
   use SoftDeletes; 

    public $transformer = CategoriaTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'nombre',
        
    ]; //
    //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /*public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fullname',
            ]
        ];
    }*/

      public function tatuajes()
    {

        return $this->belongsToMany(Tatuaje::class,'categoria_tatuajes','tatuaje_id','categoria_id');
    }
}
