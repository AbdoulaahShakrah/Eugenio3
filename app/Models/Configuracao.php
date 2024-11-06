<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    protected $table = 'Configuracao';
    protected $primaryKey = 'PK_Configuracao';
    public $timestamps = false;
}
