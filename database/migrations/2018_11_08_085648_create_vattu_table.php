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
            $table->string('tenvattu')->nullable();;
            $table->string('hieu')->nullable();;
            $table->string('dvt')->nullable();;
            $table->string('quycach')->nullable();;
            $table->string('macu')->nullable();;
            $table->string('partnumber')->nullable();;
            $table->string('ghichu')->nullable();;
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
