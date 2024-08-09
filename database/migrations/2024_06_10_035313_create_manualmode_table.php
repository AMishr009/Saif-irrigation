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
        Schema::create('manualmode', function (Blueprint $table) {
            $table->id();
            $table->string('tanks'); // Store multiple tanks
            $table->string('durations'); // Store durations for tanks
            $table->integer('pre_water_time')->nullable();
            $table->string('ph')->nullable();
            $table->string('valves'); // Store multiple valves
            $table->string('motors'); // Store multiple motors
            $table->string('injector_control');
            $table->string('lph', 8, 2)->nullable();
            $table->string('tank_sequence');
            $table->string('acid_tank');
            $table->integer('post_water_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manualmode');
    }
};
