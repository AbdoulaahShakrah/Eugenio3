<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    protected $fillable = [
        'FK_Classificacao'
    ];

    protected $table = 'Teste';
    protected $primaryKey = 'PK_Teste';
    public $timestamps = false;

    public function sessao()
    {
        return $this->belongsTo(Sessao::class, 'FK_Sessao', 'PK_Sessao');
    }
}
