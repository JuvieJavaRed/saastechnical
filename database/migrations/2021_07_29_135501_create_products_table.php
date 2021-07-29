<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 30);
            //$table->foreignId('category')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category');
            $table->foreign('category')->references('name')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('sku', 30);
            $table->unsignedDecimal('price', $precision = 8, $scale = 2);
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
