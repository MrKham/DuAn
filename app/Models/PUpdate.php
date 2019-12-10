<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;

class PUpdate extends Model
{
    use Uuid32ModelTrait;
    //

    protected $appends = [
        // for lang
        'title', 'content'
    ];

    /**
     * For lang of project.
     */
    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale() };
    }

    public function getContentAttribute()
    {
        return $this->{'content_' . app()->getLocale() };
    }
    // end
}
