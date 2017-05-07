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
          $table->unsignedInteger('quantity') -> default(0);
          $table->float('unit_weight') -> default(0);
          $table->string('description') -> nullable()-> default(null);

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
