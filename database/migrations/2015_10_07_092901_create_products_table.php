<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->unsigned();           
            $table->integer('subcatgeory_id')->unsigned();
            //$table->foreign('subcatgeory_id')->references('id')->on('sub_categories');
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 20, 2);
            $table->boolean('availability')->default(1);
            $table->string('image');
            $table->float('rating_cache', 2, 1)->default(3.0);
            $table->integer('rating_count')->default(0);
            $table->integer('instock')->default(10);
            $table->integer('order_count')->default(0);            
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
        Schema::drop('products');
    }
}
