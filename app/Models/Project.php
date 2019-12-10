<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;

class Project extends Model
{
    use Uuid32ModelTrait, Sluggable;

    const countDefault = 10;

    const newSearch = 1;
    const topCapitalSearch = 2;
    const topPeopleCapitalSearch = 3;
    const topPopularSearch = 4;
    const callingCapitalCapitalSearch = 5;

    public static function getSearchList(){
        return [
            [
                'name' => trans('general.TAT_CA_DU_AN'),
                'value' => 'all'
            ],
            [
                'name' => trans('general.GOP_VON_NHIEU_NHAT'),
                'value' => self::topCapitalSearch
            ],
            [
                'name' => trans('general.NHIEU_NGƯƠI_GOP_VON_NHAT'),
                'value' => self::topPeopleCapitalSearch
            ],
            [
                'name' => trans('general.PHO_BIEN_NHAT'),
                'value' => self::topPopularSearch
            ],
            [
                'name' => trans('general.DANG_GOI_VON'),
                'value' => self::callingCapitalCapitalSearch
            ]
        ];
    }

    protected $appends = [
        'category_slug', 'like_count', 'category_real_name', 'backer_money', 'backer_capital_count',
        // For lang of project
        'headline', 'about_project', 'project_plan', 'project_use', 'user_introduce_member'
    ];

    public function getExpenseAttribute($value)
    {
        return (float) $value;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    static function allOption() {
        $data = Project::select('name', 'id')->get();
        $dataset = [['name' => 'Chọn dự án', 'value' => '']];
        foreach ($data as $r) {
            array_push($dataset, [
                'name' => $r->name,
                'value' => $r->id

            ]);
        }
        return $dataset;
    }

    static function allOptionOnline() {
        $data = Project::select('name', 'id')->isOnline()->get();
        $dataset = [['name' => 'Chọn dự án', 'value' => '']];
        foreach ($data as $r) {
            array_push($dataset, [
                'name' => $r->name,
                'value' => $r->id

            ]);
        }
        return $dataset;
    }

    static function isProjectIdea($registration_service) 
    {
        if ($registration_service == 'Y_TUONG' || empty($registration_service)) {
            return true;
        }
        return false;
    }

    /**
     * For lang of project.
     */
    public function getHeadlineAttribute()
    {
        return $this->{'headline_' . app()->getLocale() };
    }

    public function getAboutProjectAttribute()
    {
        return $this->{'about_project_' . app()->getLocale() };
    }

    public function getProjectPlanAttribute()
    {
        return $this->{'project_plan_' . app()->getLocale() };
    }

    public function getProjectUseAttribute()
    {
        return $this->{'project_use_' . app()->getLocale() };
    }

    public function getUserIntroduceMemberAttribute()
    {
        return $this->{'user_introduce_member_' . app()->getLocale() };
    }
    // end

    public function media()
    {
        return $this->belongsToMany('App\Models\Media', 'project_media', 'project_id', 'media_id')->orderBy('created_at');
    }

    public function backers()
    {
        return $this->hasMany('App\Models\Backer')->whereIn('status', ['successful', 'refunded']);
    }

    public function updates()
    {
        return $this->hasMany('App\Models\PUpdate');
    }

    public function rewards()
    {
        return $this->hasMany('App\Models\PReward');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function creator()
    {
        return $this->belongsTo("App\Models\User", "created_by");
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'target');
    }

    public function liked()
    {
        if (Auth::user())
        {
            return $this->morphMany('App\Models\Like', 'target')->where("created_by", Auth::user()->id);
        }
        else
        {
            return $this->morphMany('App\Models\Like', 'target')->where("created_by", 1);
        }
    }

    public function getLikeCountAttribute()
    {
            return $this->morphMany('App\Models\Like', 'target')->count();
    }

    public function getCategorySlugAttribute()
    {
        // $data = $this->with('category')->find('id');
        return isset($this->category->name) ? str_slug($this->category->name) : 'null';
    }

    public function getCategoryRealNameAttribute()
    {
        if ($this->category != null){
            return isset($this->category->name) ? $this->category->name : ' ';
        }
        return '';
    }

    public function getBackerMoneyAttribute()
    {
        $money_from_backers = 0;
        if ($this->backers != null){
            foreach ($this->backers as $backers) {
                $money_from_backers += $backers->amount;
            }
        }
        return $money_from_backers;
    }

    public function getBackerCapitalCountAttribute()
    {
        $count_backer = 0;
        if ($this->backers != null){
            $count_backer = count($this->backers);
        }
        return $count_backer;
    }

    //helper

    static function isOwner($project_id) {
        $creator = Project::findOrFail($project_id)->creator;
        $creator_id = isset($creator->id) ? $creator->id : '';
        if (Auth::user()->hasRole('project_mod') || Auth::user()->hasRole('admin')) {
            return true;
        }
        if ($creator_id !== Auth::user()->id) {
            abort(503, "Permission denied");
            return false;
        }
    }

    static function isCanEditForm($project) {
        if (Auth::user()->hasRole('project_mod') || Auth::user()->hasRole('admin')) 
        {
            return true;
        }
        if ($project->disable_edit_info) 
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    static function denieWhenNotCanEditForm($project) 
    {
        if (!self::isCanEditForm($project))
        {
            abort(503, "Permission denied");
        }
    }

    //scope
    public function scopeInfo($query)
    {
        return $query->with('backers');
    }

    public function scopeDetail($query)
    {
        return $query->with(['backers', 'updates' => function ($q) {
            return $q->orderBy('created_at', 'desc');
        }, 'rewards' => function ($q) {
            return $q->orderBy('cost');
        }, 'category', 'creator', 'liked'])->withCount('backers', 'updates', 'likes');
    }


    public function scopeDetailMore($query)
    {
        return $query->with(['backers', 'updates' => function ($q) {
            return $q->orderBy('created_at', 'desc');
        }, 'rewards' => function ($q) {
            return $q->orderBy('cost');
        }, 'category', 'creator', 'liked', 'media'])->withCount('backers', 'updates', 'likes');
    }

    public function scopeIsOnline($query)
    {
        return $query->whereStatus('online');
    }

    static public function boot()
    {
    	Project::bootUuid32ModelTrait();
        Project::saving(function ($model) {
        	if (Auth::user())
        	{
	            if ($model->id)
	            {
	            	$model->updated_by = Auth::user()->id;
	            }
	            else
	            {
					$model->created_by = Auth::user()->id;
	            }
	        }

            //generate slug
            $original = $model->getOriginal();
            $original_name = isset($original['name']) ? $original['name'] : '';

            if ($model->id && $model->name == $original_name)
            {
                
            }
            else
            {
                $slug_lar = str_slug($model->name);
                // dd($slug_lar);
                $slug = SlugService::createSlug(Project::class, 'slug', $slug_lar);
                $model->slug = $slug;
            }
        });
    }
}
