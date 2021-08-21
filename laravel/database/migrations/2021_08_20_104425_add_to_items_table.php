<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToItmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            //
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
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('productName');
            $table->dropColumn('saleAddress');
            $table->dropColumn('newProduct');
            $table->dropColumn('exchange');
            $table->dropColumn('delivery');
        });
    }
}
