<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facilty_id');
            $table->string('year');
            $table->string('fuel');
            $table->string('amount_of_fuel');
            $table->string('units');
            $table->float('CO2', 8, 2);
            $table->float('CH4', 8, 2);
            $table->float('N2O', 8, 2);
            $table->float('CO2E', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculations');
    }
};