<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->json('category')->nullable();
            $table->string('info',100)->nullable();
            $table->string('power',100)->nullable();
            $table->string('voltage',100)->nullable();
            $table->string('current',100)->nullable();
            $table->string('heater_count',100)->nullable();
            $table->string('steam_capacity',100)->nullable();
            $table->string('flow_rate',100)->nullable();
            $table->string('approximate',100)->nullable();
            $table->string('operating_pressure',100)->nullable();
            $table->string('maximum_pressure',100)->nullable();
            $table->string('boiler_vessel_capacity',100)->nullable();
            $table->string('boiler_temperature',100)->nullable();
            $table->string('sprayer_tip_temperature',100)->nullable();
            $table->string('steam_temperature_sprayed',100)->nullable();
            $table->string('preheating_time',100)->nullable();
            $table->string('water_tank_capacity',100)->nullable();
            $table->string('fuel_tank_capacity',100)->nullable();
            $table->string('fuel_consumption',100)->nullable();
            $table->string('steam_hose_connections',100)->nullable();
            $table->string('guns_included',100)->nullable();
            $table->string('direct_water_connection',100)->nullable();
            $table->string('product_weight',100)->nullable();
            $table->string('product_dimensions',100)->nullable();
            $table->string('freight_dimensions',100)->nullable();
            $table->string('body_materials',100)->nullable();
            $table->string('colors_available',100)->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('product_specifications');
    }
}
