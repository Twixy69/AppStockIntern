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
          $table->date('boxing_date')-> nullable() -> default(null);
          $table->date('expedition_date')-> nullable() -> default(null);
          $table->date('reception_date')-> nullable() -> default(null);
          $table->enum('state',['creation','boxed','sending','receipt']) -> default('creation');
          $table->float('weight') -> default(0);
          $table->unsignedInteger('id_b_ls');

          /* Stamps fields */
          $table->timestamps();
          $table->unsignedInteger('created_by') -> nullable() -> default(null);
          $table->unsignedInteger('updated_by') -> nullable() -> default(null);

          /* Unicity and constraints*/
          $table->foreign('id_b_ls') -> references('id')->on('b_ls');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('colis');
    }
}
