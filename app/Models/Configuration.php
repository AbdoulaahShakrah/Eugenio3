<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'configurations';
    protected $primaryKey = 'configuration_id';

    protected $fillable = [
                            'configuration_title',
                            'configuration_time',
                            'configuration_text',
                            'created_at',
                            'updated_at'
                        ];
    public function sessionConfigurations(){
        return $this->hasMany(SessionConfiguration::class, 'configuration_id', 'configuration_id');
    }
}

    
