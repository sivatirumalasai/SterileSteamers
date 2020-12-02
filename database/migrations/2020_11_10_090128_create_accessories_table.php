<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string('code',100);
            $table->float('actual_price',10,2)->default('0');
            $table->float('discount',10,2)->default('0');
            $table->json('images');
            $table->json('category');
            $table->longText('description',500);
            $table->longText('short_description',200);
            $table->string("width",100);
            $table->string('dimensions',100);
            $table->string('length',100);
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
        Schema::dropIfExists('accessories');
    }
}
