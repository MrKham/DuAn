<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use Auth;

class Category extends Model
{
    use Uuid32ModelTrait;
    const minProjectCount = 3;

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_categories', 'category_id', 'post_id');
    }

    protected $appends = ['parent_name', 'list_child'];

    public function projects(){
        return $this->hasMany('App\Models\Project', 'category_id');
    }

    static function allOption($parent = false)
    {
        $data = Category::where([]);

        if ($parent) {
            $data = $data->whereNull('parent_id');
        }
        $data = $data->get();
        $dataset = [['name' => trans('project.CHOOSE_CATEGORY'), 'value' => '']];
        // for ($i=0; $i < 100; $i++) { 
        //     array_push($dataset, [
        //         'name' => 'name'.$i,
        //         'value' => $i

        //     ]);
        // }
        foreach ($data as $r) {
            array_push($dataset, [
                'name' => $r->name,
                'value' => $r->id

            ]);
        }
        return $dataset;
    }


    static function cateAllOption($parent = false)
    {
        $data = Category::where([]);

        if ($parent) {
            $data = $data->whereNull('parent_id');
        }
        $data = $data->get();
        $dataset = [['name' => trans('general.THUOC_MOI_LINH_VUC'), 'value' => '']];
        // for ($i=0; $i < 100; $i++) {
        //     array_push($dataset, [
        //         'name' => 'name'.$i,
        //         'value' => $i

        //     ]);
        // }
        foreach ($data as $r) {
            array_push($dataset, [
                'name' => $r->name,
                'value' => $r->id

            ]);
        }
        return $dataset;
    }

    public function getNameAttribute()
    {
        return $this["name_".app()->getLocale()];
    }

    public function getParentNameAttribute()
    {
        $data = null;
        if ($this->parent_id != null) {
            $data = $this->where('id', $this->parent_id)->first();
        }
        return $data != null && $data->name != null ? $data->name : '';
    }

    public function getListChildAttribute()
    {
        $data = $this->where('parent_id', $this->id)->get();
        return $data;
    }

    static function getListCatAndChild()
    {
        $array = [];
        $cats = Category::select('id', "name_".app()->getLocale())->whereNull('parent_id')->get();

        return $cats;

    }

    static public function boot()
    {
        Category::bootUuid32ModelTrait();
        Category::saving(function ($data) {
            if (Auth::user()) {
                if ($data->id) {
                    $data->updated_by = Auth::user()->id;
                } else {
                    $data->created_by = Auth::user()->id;
                }
            }
        });
    }
}
