<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CategoriaTatuaje extends Model
{
  use SoftDeletes; 
  protected $connection = 'mysql';
  protected $table      = 'categoria_tatuajes';
  protected $primaryKey = 'id';
  protected $fillable   = ['categoria_id','tatuaje_id']; //
  
        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
