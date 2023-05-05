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
            $table->bigInteger('id_cate');
            $table->bigInteger('id_supp');
            $table->string('name_prod');
            $table->string('marque_prod');
            $table->float('original_price');
            $table->float('selling_price');
            $table->bigInteger('qte_stock');
            $table->float('tax');
            $table->string('color');
            $table->string('storage');
            $table->string('image');
            $table->longText('description');
            $table->longText('small_descripton');
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
