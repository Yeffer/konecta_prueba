<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
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
            $table->string('name')->unique()->nullable();
            $table->string('reference')->nullable();
            $table->integer('price')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('stock')->nullable();                  
            $table->bigInteger('category_id')->unsigned()->index()->nullable();  
            $table->timestamp('created_at')->nullable();            
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');   
           // $table->foreign('brand_id')->on('brands')->references('id')     
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
