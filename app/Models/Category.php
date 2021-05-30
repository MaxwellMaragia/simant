<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','category_posts')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
