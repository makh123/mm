<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use sluggable;
    use \Conner\Tagging\Taggable;
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
    public function path()
    {

        return "/news/$this->slug";
    }
    public function scopeSearch($query , $keywords)
    {
        $query->where('title','LIKE','%'.$keywords. '%');
        $keywords = explode(' ',$keywords);

        return $query;
    }



    public function getRouteKeyName()
    {
        return 'slug' ;
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }

}
