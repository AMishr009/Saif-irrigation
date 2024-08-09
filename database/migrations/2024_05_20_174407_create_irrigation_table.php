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
        Schema::create('irrigation', function (Blueprint $table) {
            $table->id();
            $table->integer('program_no');
            $table->string('program_name');
            $table->string('select_valves');
            $table->string('select_motors');
            $table->string('irrigation_type');
            $table->string('total_area');
            $table->string('required_water');
            $table->string('total_water');
            $table->string('fertigation_receipt_no');
            $table->string('fertigation_type');
            $table->string('injector_control');
            $table->string('fertigation_ec');
            $table->string('pre_water_1')->nullable();
            $table->string('pre_water_2')->nullable();
            $table->string('post_water_1')->nullable();
            $table->string('post_water_2')->nullable();
            $table->string('fertigation_water_1')->nullable();
            $table->string('fertigation_water_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irrigation');
    }
};
