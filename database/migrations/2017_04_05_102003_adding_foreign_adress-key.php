<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingForeignAdressKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('colis', function (Blueprint $table) {

          $table->unsignedInteger('id_address') -> nullable()-> default(null);
          $table->foreign('id_address') -> references('id')->on('adresses');
      });

      Schema::table('affaires', function (Blueprint $table) {

          $table->unsignedInteger('id_address') -> nullable()-> default(null);
          $table->foreign('id_address') -> references('id')->on('adresses');
      });

      Schema::table('b_ls', function (Blueprint $table) {

          $table->unsignedInteger('id_address') -> nullable()-> default(null);
          $table->foreign('id_address') -> references('id')->on('adresses');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('colis', function (Blueprint $table) {
              $table->dropForeign('colis_id_address_foreign');
              $table->dropColumn('id_address');

      });

      Schema::table('affaires', function (Blueprint $table) {
              $table->dropForeign('affaires_id_address_foreign');
              $table->dropColumn('id_address');

      });

      Schema::table('b_ls', function (Blueprint $table) {
              $table->dropForeign('b_ls_id_address_foreign');
              $table->dropColumn('id_address');

      });
    }
}
