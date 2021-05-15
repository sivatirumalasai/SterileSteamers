<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoryCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_category_coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('service_category_plan_id');
            $table->string('name');
            $table->string('type');
            $table->string('image');
            $table->string('amount');
            $table->double("discount",10,2)->default(0);
            $table->integer("no_of_paid_services")->default(0);
            $table->integer("no_of_free_services")->default(0);
            $table->boolean('status')->default(1);
            $table->integer('duration')->default(30);
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
        Schema::dropIfExists('service_category_coupons');
    }
}
