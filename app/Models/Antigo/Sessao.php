<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    protected $table = 'Sessao';
    protected $primaryKey = 'PK_Sessao';
    public $timestamps = false;

    public function testes()
    {
        return $this->hasMany(Teste::class, 'FK_Sessao', 'PK_Sessao');
    }
}
