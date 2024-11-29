<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';
    protected $primaryKey = 'session_id';
    protected $fillable = ['session_name', 'created_at'];

    public function players(): HasMany {
        return $this->hasMany(Player::class, 'session_id', 'session_id');
    }

    public function sessionConfigurations(){
        return $this->hasMany(SessionConfiguration::class, 'session_id', 'session_id');
    }
}
