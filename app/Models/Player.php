<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';
    protected $primaryKey = 'player_id';
    protected $fillable = ['player_name', 'session_id'];

    public function session(): BelongsTo {
        return $this->belongsTo(Session::class, 'session_id', 'session_id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'player_id', 'player_id');
    }
}
