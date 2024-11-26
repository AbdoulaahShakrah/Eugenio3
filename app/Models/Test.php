<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $primaryKey = 'test_id';

    protected $fillable = ['player_id', 'configuration_id', 'wpm', 'test_error', 'test_correct', 'test_time', 'final_score' , 'created_at'];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'player_id'); 
    }

    public function configuration()
    {
        return $this->belongsTo(Configuration::class, 'configuration_id', 'configuration_id' ); 
    }
}
