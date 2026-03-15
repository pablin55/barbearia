<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faturamento extends Model
{
    protected $fillable = [
        'agendamento_id',
        'cliente',
        'valor',
        'forma_pagamento'
    ];
}