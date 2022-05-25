<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\Sexo;
use App\Models\Lugar;
use App\Transformers\TatuajeTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tatuaje extends Model
{
     use SoftDeletes;
    public $transformer = TatuajeTransformer::class;
    protected $connection = 'mysql';
    protected $table      = 'tatuajes';
    protected $primaryKey = 'id';
    protected $fillable   = [
        //'categoria_id',
        'fuente',
        'tamaño',
        'nombre',
        'imagen',
        'descripcion',
        'precio_base'

    ]; ////
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sexos()
    {

        return $this->belongsToMany(Sexo::class,'sexo_tatuajes');
    }

     public function lugares()
    {

        return $this->belongsToMany(Lugar::class,'lugar_tatuajes');
    }

    public function categorias()
    {

        return $this->belongsToMany(Categoria::class,'categoria_tatuajes');
    }
}
