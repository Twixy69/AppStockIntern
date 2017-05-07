<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_affaire');
            $table->string('ref_lot');

            $table->float('theorical_weight', 11, 2)-> nullable() -> default(null);
            $table->float('manufactured_weight', 11, 2)-> nullable() -> default(null);
            $table->float('mounted_weight', 11, 2)-> nullable() -> default(null);
            $table->float('painted_weight', 11, 2)-> nullable() -> default(null);
            $table->float('sent_weight', 11, 2)-> nullable() -> default(null); // update from pieces' weight & state

            $table->float('sent_selled_weight', 11, 2)-> nullable() -> default(null); // update from pieces' weight & state + BL choice (boolean)

            $table->unsignedInteger('created_by') -> nullable() -> default(null);
            $table->unsignedInteger('updated_by') -> nullable() ->default(null);

            /* Unicity and constraints*/
            $table->unique(['id_affaire', 'ref_lot']);
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
        Schema::dropIfExists('lots');
    }
}
