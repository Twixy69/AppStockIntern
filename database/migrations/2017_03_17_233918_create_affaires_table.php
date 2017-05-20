<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('affaires', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ref_affaire') -> nullable() -> default(null);
          $table->unsignedInteger('created_by') -> nullable() -> default(null);

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affaires');
    }
}
