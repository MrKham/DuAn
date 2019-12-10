<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use Auth;

class Like extends Model
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
    	Like::bootUuid32ModelTrait();
        Like::saving(function ($like) {
        	if (Auth::user())
        	{
	            if ($like->id)
	            {
	            	$like->updated_by = Auth::user()->id;
	            }
	            else
	            {
					$like->created_by = Auth::user()->id;
	            }
	        }
        });
    }
}
