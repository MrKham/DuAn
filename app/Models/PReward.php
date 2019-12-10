<?php

namespace App\Models;
use Alsofronie\Uuid\Uuid32ModelTrait;

use Illuminate\Database\Eloquent\Model;

class PReward extends Model
{
    use Uuid32ModelTrait;
    //

    protected $appends = ['is_limited_check', 'description'];

    public function getCostAttribute($value)
    {
        return (float) $value;
    }

    public function getLimiteNumberAttribute($value)
    {
        return isset($value) ? intval($value) : null;
    }

    public function getIsLimitedCheckAttribute()
    {
        return $this->limite_number ? true : false;
    }

    /**
     * For lang of project.
     */
    public function getDescriptionAttribute()
    {
        return $this->{'description_' . app()->getLocale() };
    }
    // end

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
