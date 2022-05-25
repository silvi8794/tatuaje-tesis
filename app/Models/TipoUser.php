<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\TipoUserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUser extends Model
{
    use SoftDeletes; 

    public $transformer = TipoUserTransformer::class;

    protected $connection = 'mysql';
    protected $table      = 'tipousers';
    protected $primaryKey = 'id';
    protected $fillable   = ['nombre'];  //

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     public function user(){

     return $this->belongsTo(User::class,'user_id','id');
     
     }
}
