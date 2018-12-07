<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vattu extends Model
{
    protected $table='vattu';

    protected  $fillable=['mavattu','tenvattu','hieu','dvt','quycach','macu','partnumber','ghichu'];
}
