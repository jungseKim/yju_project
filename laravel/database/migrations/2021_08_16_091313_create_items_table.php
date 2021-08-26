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
            $table->string('item')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('CASCADE');
            $table->string('img');
            $table->integer('price')->nullable();
            $table->string('category')->nullable();
            $table->boolean('sold')->default(false)->nullable();
            $table->timestamps();
            $table->String('content')->nullable();
            $table->string('newProduct')->nullable();
            $table->string('exchange')->nullable();
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
