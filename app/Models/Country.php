<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'country_name',
    ];

    public function posts(){

        return $this->belongsToMany('App\Models\Post', 'posts_countries','countries_id', 'post_id');
    }
}
