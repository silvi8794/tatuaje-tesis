<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LugarTatuaje extends Model
{
  use SoftDeletes; 
  protected $connection = 'mysql';
  protected $table      = 'lugar_tatuajes';
  protected $primaryKey = 'id';
  protected $fillable   = ['lugar_id','tatuaje_id']; //
  
        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
