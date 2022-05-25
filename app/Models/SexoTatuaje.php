<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SexoTatuaje extends Model
{
    use SoftDeletes; 
    protected $connection = 'mysql';
    protected $table      = 'sexo_tatuajes';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'sexo_id',
        'tatuaje_id'
    ];    //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
