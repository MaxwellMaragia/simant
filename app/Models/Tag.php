<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_tags')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
