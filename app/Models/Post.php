<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'url_image',
        'description',
        'content'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'posts_categories','post_id', 'category_id');
    }

    public function countries(){
        return $this->belongsToMany('App\Models\Country', 'posts_countries','post_id', 'country_id');
    }
}
