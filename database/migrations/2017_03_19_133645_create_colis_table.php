<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('colis', function (Blueprint $table) {
          $table->increments('id');
          $table->enum('color', ['green', 'white','red','blue','yellow']);
          $table->unsignedInteger('number');
          $table->date('boxing_date');
          $table->date('expedition_date');
          $table->enum('state',['creation','boxed','send','receipt']) -> default('creation');
          $table->float('weight') -> default(0);

          /* Stamps fields */
          $table->timestamps();
          $table->unsignedInteger('created_by') -> nullable() -> default(null);
          $table->unsignedInteger('updated_by') -> nullable() -> default(null);

          /* Unicity and constraints*/
          $table->unique(['id_affaire', 'ref_piece']);
          $table->foreign('id_affaire') -> references('id')->on('affaires');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
