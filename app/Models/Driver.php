<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = ['NOME', 'TELEFONE', 'WHATSAPP'];
    protected $table = 'motorista';
    public $timestamps = false;
}
