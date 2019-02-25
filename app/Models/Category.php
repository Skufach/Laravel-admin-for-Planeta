<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category_name',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'posts_categories', 'category_id', 'post_id');
    }
}
