<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use Auth;


class Comment extends Model
{
    use Uuid32ModelTrait;

    public function target()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->belongsTo("App\Models\User", "created_by");
    }

    static public function boot()
    {
    	Comment::bootUuid32ModelTrait();
        Comment::saving(function ($comment) {
        	if (Auth::user())
        	{
	            if ($comment->id)
	            {
	            	$comment->updated_by = Auth::user()->id;
	            }
	            else
	            {
					$comment->created_by = Auth::user()->id;
	            }
	        }
        });
    }
}
