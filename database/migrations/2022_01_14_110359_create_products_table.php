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
            $table->string('name');
            $table->string('unit_id')->constrained();
            $table->string('image');
            $table->longText('description')->nullable();
            $table->string('material_category_id')->constrained();
            $table->string('online_category_id')->constrained();
            $table->string('franchise_category_id')->constrained();
            $table->string('restaurant_category_id')->constrained();
            $table->string('payment_category_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('products');
    }
}
