<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Video extends Model
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
                'source' => 'name'
            ]
        ];
    }
    public function path()
    {

        return "/video/$this->slug";
    }
}
