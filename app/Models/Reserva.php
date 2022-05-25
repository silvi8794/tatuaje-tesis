<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Tatuador;
use App\Models\Tatuaje;
use App\Transformers\ReservaTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    public $transformer = ReservaTransformer::class;
    protected $connection = 'mysql';
    protected $table      = 'reservas';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'cliente_id',
        'tatuador_id',
        'tatuaje_id',
        'codigo_de_seguridad',
        'fecha',
        'estado',
        'deleted_at'
    ]; //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];  //

     public function cliente()

    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

     public function tatuador()

    {
        return $this->belongsTo(Tatuador::class, 'tatuador_id', 'id');
    }


     public function tatuaje()

    {
        return $this->belongsTo(Tatuaje::class, 'tatuaje_id', 'id');
    }
}
