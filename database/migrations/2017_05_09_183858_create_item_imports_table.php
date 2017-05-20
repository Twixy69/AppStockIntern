<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_imports', function (Blueprint $table) {
            $table->increments('id');
            $table->text('rep_re',20) ;
            $table->text('profil')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('longueur')->nullable();
            $table->double('surface',14,4)->nullable();
            $table->double('poids_unit',14,4)->nullable();
            $table->double('poids_tot',14,4)->nullable();
            $table->text('designation')->nullable();
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
        Schema::dropIfExists('item_imports');
    }
}
