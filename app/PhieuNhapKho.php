<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhapKho extends Model
{
   protected $table='phieunhap';

    protected  $fillable=['id','mavattu','ngaynhap','soluong','giatri','nguoinhap','ghichu'];

    public $timestamps=true;
}
