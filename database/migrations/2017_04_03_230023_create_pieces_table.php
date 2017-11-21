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
          $table->unsignedInteger('id_lot') -> nullable()-> default(null);

          $table->string('ref_piece');
          $table->text('profil')->nullable();
          $table->integer('quantity')->nullable();
          $table->integer('length')->nullable();
          $table->double('surface',14,4)->nullable();
          $table->double('unit_weight',14,4)->nullable();
          $table->text('designation')->nullable();

          /* Stamps fields */
          $table->timestamps();
          $table->unsignedInteger('created_by') -> nullable() -> default(null);
          $table->unsignedInteger('updated_by') -> nullable() -> default(null);

          /* Unicity and constraints*/
          $table->unique(['id_lot', 'ref_piece']);
          $table->foreign('id_lot') -> references('id')->on('lots');
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
