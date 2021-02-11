<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOderAddOnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order_add_ons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_order_id');
            $table->integer('model_id');
            $table->string('model_type',50);
            $table->integer('quantity');
            $table->double('actual_amount',10,2)->default(0);
            $table->double('discount_amount',10,2)->default(0);
            $table->double('final_amount',10,2)->default(0);
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
        Schema::dropIfExists('user_oder_add_ons');
    }
}
