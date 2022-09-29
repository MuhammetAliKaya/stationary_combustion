<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\Unit;
use App\Models\Year;
use App\Models\Facilty;
use App\Models\Calculations;
use Illuminate\Http\Request;
use Brick\Math\Internal\Calculator;

class CalculatorController extends Controller
{
    public function getPage()
    {
        $faciltys = Facilty::all();
        $years = Year::all();
        $fuels = Fuel::all();
        $units = Unit::all();
        return view('stationaryCombustion', compact('faciltys', 'years', 'fuels', 'units'));
    }

    public function datatable()
    {
        $calculations = Calculations::all();
        return view('datatable', compact('calculations'));
    }

    public function calculate(Request $request)
    {
        $fuelMultiplier = Fuel::whereId($request->fuel)->first()->fuel_multiplier;
        $unitMultiplier = Unit::whereId($request->unit)->first()->unit_multiplier;

        $co2Value = $fuelMultiplier * $unitMultiplier * $request->amount_of_fuel * (0.57);
        $ch4Value = $fuelMultiplier * $unitMultiplier * $request->amount_of_fuel * (0.25);
        $n2oValue = $fuelMultiplier * $unitMultiplier * $request->amount_of_fuel * (0.18);
        $co2eValue = $fuelMultiplier * $unitMultiplier * $request->amount_of_fuel;

        $response = [
            'co2Value' => $co2Value,
            'ch4Value' => $ch4Value,
            'n2oValue' => $n2oValue,
            'co2eValue' => $co2eValue
        ];

        return $response;
    }

    public function getSingle(Request $request)
    {
        $response = Calculations::whereId($request->id)->first();
        $response->facilty_name = Facilty::where('facilty_id', $response->facilty_id)->first()->facilty_name ?? null;
        $response->fuel_id = Fuel::where('fuel_name', $response->fuel)->first()->id ?? null;
        $response->units_id = Unit::where('unit_name', $response->units)->first()->id ?? null;
        return $response;
    }

    public function store(Request $request)
    {
        try {
            return Calculations::create([
                'facilty_id' => $request->facility_id,
                'year' => $request->year,
                'fuel' => Fuel::whereId($request->fuel)->first()->fuel_name,
                'amount_of_fuel' => $request->amount_of_fuel,
                'units' => Unit::whereId($request->unit)->first()->unit_name,
                'CO2' => $request->CO2,
                'CH4' => $request->CH4,
                'N2O' => $request->N2O,
                'CO2E' => $request->CO2E,
            ]);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update(Request $request)
    {
        Calculations::whereId($request->id)->update([
            'facilty_id' => $request->facility_id,
            'year' => $request->year,
            'fuel' => Fuel::whereId($request->fuel)->first()->fuel_name,
            'amount_of_fuel' => $request->amount_of_fuel,
            'units' => Unit::whereId($request->unit)->first()->unit_name,
            'CO2' => $request->CO2,
            'CH4' => $request->CH4,
            'N2O' => $request->N2O,
            'CO2E' => $request->CO2E,
        ]);
    }
    public function delete(Request $request)
    {
        return Calculations::whereId($request->id)->delete();
    }
}