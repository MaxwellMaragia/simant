<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function  tags()
    {
        return $this->belongsToMany('App\Models\Tag','post_tags');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_posts');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
