<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;
use App\Models\Like;

class Post extends Model
{
    use Uuid32ModelTrait, Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function media()
    {
        return $this->belongsToMany('App\Models\Media', 'post_media', 'post_id', 'media_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'post_categories', 'post_id', 'category_id');
    }

    public function getPublishDateAttribute($value)
    {
        return substr($value, 0, 10);
    }

    public function getExpirationDateAttribute($value)
    {
        return substr($value, 0, 10);
    }

    //scope
    public function scopeLimitDatetime($query)
    {
        dd($query);
        // return $query->with('backers');
    }

    static public function boot()
    {
    	Post::bootUuid32ModelTrait();
        Post::saving(function ($post) {
        	if (Auth::user())
        	{
	            if ($post->id)
	            {
	            	$post->updated_by = Auth::user()->id;
	            }
	            else
	            {
					$post->created_by = Auth::user()->id;
	            }
	        }
        });
    }

}
