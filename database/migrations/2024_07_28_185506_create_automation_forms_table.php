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
        Schema::create('automation_forms', function (Blueprint $table) {
            $table->id();
            $table->string('fertigation_no')->nullable();
            $table->string('fertigation_ph')->nullable();
            $table->string('fertigation_receipt_name')->nullable();
            $table->string('stage_name')->nullable();
            $table->string('stage_days')->nullable();
            $table->string('default_switch_checkbox_input')->nullable();
            $table->string('tank1')->nullable();
            $table->string('tank2')->nullable();
            $table->string('tank3')->nullable();
            $table->string('time_entry1')->nullable();
            $table->string('time_entry2')->nullable();
            $table->string('time_entry3')->nullable();
            $table->string('pre_water_ph')->nullable();
            $table->string('post_water_ph')->nullable();
            $table->string('total_water_ph')->nullable();
            $table->string('per_water_volume')->nullable();
            $table->string('post_water_volume')->nullable();
            $table->string('total_water_volume')->nullable();
            $table->string('per_water_time')->nullable();
            $table->string('post_water_time')->nullable();
            $table->string('total_water_time')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('cycle')->nullable();
            $table->string('timer')->nullable();
            $table->string('interval')->nullable();
            $table->string('climate_controller_serial_no')->nullable();
            $table->string('climate_controller_name')->nullable();
            $table->string('climate_controller_type')->nullable();
            $table->string('climate_controller_start_time')->nullable();
            $table->string('climate_controller_end_time')->nullable();
            $table->string('climate_controller_on_time')->nullable();
            $table->string('climate_controller_off_time')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automation_forms');
    }
};
