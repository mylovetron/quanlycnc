<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuXuat extends Model
{
    protected $table='phieuxuat';

    protected  $fillable=['id','mavattu','ngayxuat','soluong','giatri','nguoixuat','ghichu'];

    public $timestamps=true;
}
