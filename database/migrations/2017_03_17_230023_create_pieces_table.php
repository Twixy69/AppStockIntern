<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pieces', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_affaire');
          $table->string('ref_piece');
          $table->unsignedInteger('quantity');
          $table->float('unit_weight')->nullable();
          $table->string('description')->nullable();
          $table->string('author_created');
          $table->string('author_updated')->nullable();
          $table->timestamps();

          $table->unique('id');
          $table->unique(['id_affaire', 'ref_piece']);
          $table->foreign('id_affaire')->references('id')->on('affaires');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pieces');
    }
}
