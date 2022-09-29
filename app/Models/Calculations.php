<?php

namespace App\Models;

use App\Models\Fuel;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calculations extends Model
{
    use HasFactory;
    protected $guarded = [];

    const TEST_DATA = [
        'id' => 9999,
        'facilty_id' => 9999,
        'year' => 9999,
        'fuel' => 'gasoline',
        'amount_of_fuel' => 9999,
        'units' => 'liter',
        'CO2' => 9999,
        'CH4' => 9999,
        'N2O' => 9999,
        'CO2E' => 9999,
    ];
}