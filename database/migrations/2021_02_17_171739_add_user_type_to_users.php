<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type',['customer','operator'])->default('customer');
        });
        Schema::table('user_orders',function (BluePrint $table)
        {
           $table->string('booking_date',50)->default(null); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });
        Schema::table('user_orders', function (Blueprint $table) {
            $table->dropColumn('booking_date');
        });
    }
}
