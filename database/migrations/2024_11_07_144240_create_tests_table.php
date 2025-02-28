<?php

use App\Models\Configuration;
use App\Models\Player;
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
        Schema::create('tests', function (Blueprint $table) {
            $table->id('test_id');

            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade');

            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('player_id')->on('players')->onDelete('cascade');

            $table->unsignedBigInteger('configuration_id');
            $table->foreign('configuration_id')->references('configuration_id')->on('configurations')->onDelete('cascade');

            $table->integer('wpm');
            $table->integer('test_error');
            $table->integer('test_correct');
            $table->time('test_time');
            $table->integer('final_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
