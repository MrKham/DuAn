<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use \Auth;

class BlackList extends Model
{
    use Uuid32ModelTrait;

    protected $table = 'black_lists';
    public function creator()
    {
        return $this->belongsTo("App\Models\User", "created_by");
    }
    static public function boot()
    {
        BlackList::bootUuid32ModelTrait();
        BlackList::saving(function ($post) {
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
