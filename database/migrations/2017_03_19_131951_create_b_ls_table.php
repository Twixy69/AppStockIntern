<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBLsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_ls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_b_l',30);
            $table->string('matricule',12)-> nullable() -> default(null);
            $table->string('phone',13)-> nullable() -> default(null);
            $table->string('name_1',13) -> nullable() -> default(null);
            $table->string('name_2',13) -> nullable() -> default(null);

            $table->enum('state',['noInfo','created','ready','sent','receipt']) -> default('noInfo');
            /* Stamps fields */
            $table->timestamps();
            $table->unsignedInteger('created_by') -> nullable() -> default(null);
            $table->unsignedInteger('updated_by') -> nullable() -> default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_ls');
    }
}
