<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('maphieu')->unique();
            $table->string('mavattu')->unique();
            $table->date('ngaynhap');
            $table->integer('soluong');
            $table->double('giatri');
            $table->string('nguoinhap');
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
        Schema::dropIfExists('phieunhap');
    }
}
