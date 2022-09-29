<?php

namespace Tests\Unit;

use App\Models\Fuel;
use App\Models\Unit;
use App\Models\Calculations;
use Tests\TestCase;
use App\Http\Controllers\CalculatorController;

class CrudTest extends TestCase
{


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_create()
    {

        $cal = Calculations::create(Calculations::TEST_DATA);

        $this->assertTrue(isset($cal));
        $cal->delete();
    }
    public function test_read()
    {
        $cals = Calculations::get();
        $this->assertTrue(isset($cals));
    }
    public function test_update()
    {

        $cal = Calculations::create(Calculations::TEST_DATA);

        $cal->update(['facilty_id' => 8888]);

        $this->assertTrue($cal->facilty_id == 8888);
        $cal->delete();
    }
    public function test_delete()
    {
        $cal = Calculations::create(Calculations::TEST_DATA);
        $cal->delete();
        $calAfterDel = Calculations::whereId($cal->id)->first();
        $this->assertTrue(!isset($calAfterDel));
        $cal->delete();
    }
}