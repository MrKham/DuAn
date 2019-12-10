<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use \Auth;

class Backer extends Model
{
    use Uuid32ModelTrait;

    public function getAmountAttribute($value)
    {
        return (float) $value;
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function scopeIsSuccess($query)
    {
        return $query->whereIn('status', ['successful', 'refunded']);
    }

    static public function boot()
    {
        Backer::bootUuid32ModelTrait();
        Backer::saving(function ($post) {
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
