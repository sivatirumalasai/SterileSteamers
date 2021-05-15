<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->string('image');
            $table->integer('user_type')->default(1)->comment('1-all users,2-1st time user,3-limited users');
            $table->integer('user_limit')->default(0);
            $table->string('type')->default('discount')->comment("discount,amount");
            $table->double("amount",10,2)->default(0);
            $table->date('valid_from');
            $table->date('valid_to');
            $table->boolean("status")->default(1);
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
        Schema::dropIfExists('coupons');
    }
}
