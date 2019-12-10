<?php

namespace App\Models;

use Alsofronie\Uuid\Uuid32ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use Uuid32ModelTrait;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
