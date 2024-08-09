<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualMode extends Model
{
    use HasFactory;

    protected $table = 'manualmode';
    // protected $fillable = [
    //     'tanks',
    //     'durations',
    //     'pre_water_time',
    //     'ph',
    //     'valves',
    //     'motors',
    //     'injector_control',
    //     'lph',
    //     'tank_sequence',
    //     'acid_tank',
    //     'post_water_time',
    // ];

    // protected $casts = [
    //     'tanks' => 'array',
    //     'durations' => 'array',
    //     'valves' => 'array',
    //     'motors' => 'array',
    //     'injector_control' => 'boolean',
    //     'tank_sequence' => 'boolean',
    //     'acid_tank' => 'boolean',
    // ];
}
