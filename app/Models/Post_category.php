<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{

    public function categories()
    {
    	return $this->belongsToMany('App\Models\Category', 'post_categories', 'post_id', 'category_id');
    }
}
