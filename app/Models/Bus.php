<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
    protected $fillable = ['PLACA', 'MODELO', 'APOLICE', 'OBSERVACAO', 'NUMERO', 'POLTRONAS'];
    protected $table = 'onibus';
    public $timestamps = false;
}