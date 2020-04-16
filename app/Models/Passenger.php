<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = ['NOME', 'RG', 'DATANASC', 'TELEFONE1', 'TELEFONE2', 'POLTRONA', 'CPF', 'NOMECRIANCA', 'DOCCRIANCA', 'POSSCRIANCA'];
    protected $table = 'passageiro';
    public $timestamps = false;
}
