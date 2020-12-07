<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertAddressUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
          $table->string('first_address');
          $table->string('second_address')->nullable();
          $table->string('third_address')->nullable();
          $table->string('fourth_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
          // $table->dropColumn('first_address');
          // $table->dropColumn('second_address');
          // $table->dropColumn('third_address');
          // $table->dropColumn('fourth_address');
        });
    }
}
