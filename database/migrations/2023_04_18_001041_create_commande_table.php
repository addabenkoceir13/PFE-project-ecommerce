<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_prod');
            $table->bigInteger('id_user');
            $table->bigInteger('qte_prod');
            $table->string('name_prod');
            $table->float('total_montant');
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
        Schema::dropIfExists('commande');
    }
}
