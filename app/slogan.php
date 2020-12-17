<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slogan extends Model
{
    protected $guarded=[];
    protected $casts=[
        'images'=>'array'
    ];
}
