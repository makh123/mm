<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use sluggable;

    protected $guarded=[];

    protected $casts=[
        'images'=>'array'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }




    public function getRouteKeyName()
    {
        return 'slug' ;
    }

    public function path()
    {

        return "/service/$this->slug";
    }
}
