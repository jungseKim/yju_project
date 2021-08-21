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
            $table->string('item');
            $table->string('img');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('CASCADE');
            $table->integer('price');
            $table->string('category');
            $table->boolean('sold')->default(false);
            $table->timestamps();
            $table->String('content');
            $table->string('productName');
            $table->string('saleAddress');
            $table->string('newProduct');
            $table->string('exchange');
            $table->string('delivery');
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
