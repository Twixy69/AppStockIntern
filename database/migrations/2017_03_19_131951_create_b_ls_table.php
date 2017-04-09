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
            $table->string('ref',30);
            $table->string('matricule',12);
            $table->string('phone',13);
            $table->string('name_1',13);
            $table->string('name_2',13);

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
