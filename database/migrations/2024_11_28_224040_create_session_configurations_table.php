<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('session_configurations', function (Blueprint $table) {
            $table->id('session_configuration_id');
            $table->foreignId('session_id')->references('session_id')->on('sessions')->onDelete('cascade');
            $table->foreignId('configuration_id')->references('configuration_id')->on('configurations')->onDelete('cascade');
            $table->unique(['session_id', 'configuration_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_configurations');
    }
};
