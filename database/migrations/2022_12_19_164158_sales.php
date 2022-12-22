<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable(); 
            $table->unsignedBigInteger('product_id')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
