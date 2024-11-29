<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionConfiguration extends Model
{
    use HasFactory;


    protected $table = 'session_configurations';

    protected $primaryKey = 'session_configuration_id';

    protected $fillable = ['session_id', 'configuration_id'];

    public function session():BelongsTo{
        return $this->belongsTo(Session::class, 'session_id', 'session_id');
    }

    public function configuration():BelongsTo{
        return $this->belongsTo(Configuration::class, 'configuration_id', 'configuration_id');
    }
}
