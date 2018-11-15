<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVattuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vattu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mavattu')->unique();
            $table->string('tenvattu');
            $table->string('hieu');
            $table->string('dvt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vattu');
    }
}
