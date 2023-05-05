<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_comm');
            $table->bigInteger('id_prod');
            $table->bigInteger('qte_prod');
            $table->bigInteger('total_prix');
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
        Schema::dropIfExists('facture_');
    }
}
