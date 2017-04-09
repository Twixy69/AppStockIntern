<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',150) -> default('Pseudonyme Adresse');
            $table->enum('type',['Peinture','Chantier','Galva','Livraison']);

            /* Adress part*/
            $table->string('number') -> nullable() -> default(null);
            $table->string('street',120) -> default('Rue ');
            $table->string('option',120) -> nullable() -> default(null);
            $table->integer('postal_code') -> default(69000);
            $table->string('city',50) -> default('LYON');
            $table->string('state',15) -> default('FRANCE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
