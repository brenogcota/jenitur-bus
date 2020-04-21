<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['ORIGEM', 'DESTINO', 'HORARIO', 'DATA', 'STATUS', 'MOTORISTA', 'MOTORISTA2'];
    protected $table = 'viagem';
    public $timestamps = false;
}
