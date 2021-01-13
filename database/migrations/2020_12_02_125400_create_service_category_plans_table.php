<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoryPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_category_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id');
            $table->string("name",100);
            $table->string('image',200);
            $table->longText('type',500);
            $table->integer('duration');
            $table->integer('actual_price');
            $table->integer('discount_price');
            $table->longText('description');
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
        Schema::dropIfExists('service_category_plans');
    }
}
