<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesToPiece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('states_pieces', function (Blueprint $table) {
          $table->increments('id');

          $table->unsignedInteger('id_piece');
          $table->enum('state',['noInfo','manufactured','painted','onSite','mounted']) -> default('noInfo');
          $table->unsignedInteger('quantity')->default(0)->nullable();

          /* Unicity and constraints*/
          $table->unique(['id_piece', 'state']);
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
        Schema::dropIfExists('states_pieces');
    }
}
