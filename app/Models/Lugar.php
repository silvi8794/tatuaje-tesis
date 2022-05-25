<?php

namespace App\Models;

use App\Transformers\LugarTransformer; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lugar extends Model
{
    use SoftDeletes; 

    public $transformer = LugarTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'lugars';
    protected $primaryKey = 'id';
    protected $fillable   = ['nombre']; ////
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function tatuajes()
    {

        return $this->belongsToMany(Tatuaje::class,'lugar_tatuajes','lugar_id','tatuaje_id');
    }
}
