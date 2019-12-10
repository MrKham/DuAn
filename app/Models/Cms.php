<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use \Auth;

use Cache;

class Cms extends Model
{
    use Uuid32ModelTrait;

    protected $table = 'cms';

    static function getUrlByCode($menu_code) {
        if(!Cache::has('cms_cache_url'))
        {
            $cache_data = Cms::select('menu_code', 'slug', 'type')->get();
            Cache::forever('cms_cache_url', $cache_data);
        }
        $cms = Cache::get('cms_cache_url');
        $data = $cms->first(function ($value, $key) use ($menu_code) {
            return $value->menu_code == $menu_code;
        });
        $url = '#';
        if ($data) {
            // if (count($data)) {
                $url = $data->type . '/' . $data->slug;
            // }
        }
        return $url;
    }

    static public function boot()
    {
        Cms::bootUuid32ModelTrait();
        Cms::saving(function ($data) {
            $data->slug = str_slug($data->title, '-');
            if (Auth::user())
            {
                if ($data->id)
                {
                    $data->updated_by = Auth::user()->id;
                }
                else
                {
                    $data->created_by = Auth::user()->id;
                }
            }
        });

        Cms::saved(function ($data) {
            $cache_data = Cms::select('menu_code', 'slug', 'type')->get();
            Cache::forever('cms_cache_url', $cache_data);
        });

        Cms::deleted(function ($data) {
            $cache_data = Cms::select('menu_code', 'slug', 'type')->get();
            Cache::forever('cms_cache_url', $cache_data);
        });
    }
}
