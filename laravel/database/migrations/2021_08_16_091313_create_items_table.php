<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('CASCADE');
            $table->integer('price')->nullable();
            $table->string('category')->nullable();
            $table->boolean('sold')->default(false)->nullable();
            $table->timestamps();
            $table->String('content')->nullable();
            $table->string('productName')->nullable();
            $table->string('newProduct')->nullable();
            $table->string('exchange')->nullable();
<<<<<<< HEAD
=======

>>>>>>> 29a57004a1c543ebbd5ea0a1a75db51b66981f85
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
