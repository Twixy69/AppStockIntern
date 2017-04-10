<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationPieceColis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_colis_piece', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_colis');
            $table->unsignedInteger('id_piece');
            $table->unsignedInteger('quantity');

            /* Unicity and constraints*/
            $table->foreign('id_colis') -> references('id')->on('colis');
            $table->foreign('id_piece') -> references('id')->on('pieces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_colis_piece');
    }
}
