<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuxuat', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('maphieu')->unique();
            $table->string('mavattu');
            $table->date('ngayxuat');
            $table->integer('soluong');
            $table->double('giatri');
            $table->string('nguoixuat');
            $table->string('ghichu');
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
        Schema::dropIfExists('phieuxuat');
    }
}
