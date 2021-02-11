<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('order_id',50)->nullable();
            $table->string('txn_id',50)->nullable();
            $table->integer('quantity');
            $table->double('actual_amount',10,2)->default(0);
            $table->double('discount_amount',10,2)->default(0);
            $table->double('final_amount',10,2)->default(0);
            $table->boolean('txn_status')->default(0);
            $table->string('txn_msg')->nullable();
            $table->string("promo_code")->nullable();
            $table->string("first_name");
            $table->string('last_name')->nullable();
            $table->bigInteger('mobile');
            $table->string('email');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('address')->nullable();
            $table->string('vehicle_brand')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->longText('user_message')->nullable();
            $table->integer('delivery_status')->default(0)->comment('0-pending,1-delivered,2-rejected');
            $table->date('delivery_date')->nullable();
            $table->longText('delivery_message')->nullable();
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
        Schema::dropIfExists('user_orders');
    }
}
