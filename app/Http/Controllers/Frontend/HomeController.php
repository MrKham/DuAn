<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Project;
use App\Models\PReward;
use App\Models\Backer;
use App\Models\Cms;
use Carbon\Carbon;
use App\Classes\Helper;
use App\Classes\PaymentNapas;
use Uuid, Cache;

class HomeController extends Controller
{
    private $slide_limit = 6;

    public function index()
    {
        $project = [];
        $cate = Category::has('projects', '>=', Category::minProjectCount)->get();
        $summary = Project::detail()->isOnline()->take(4)->get();
        $fund = Project::detail()->isOnline()->get();
        $focus = Project::detail()->isOnline()->where('focus', true)->first();
        $project['summary'] = Helper::convertProjectTodetail($summary);
        $project['fund'] = Helper::convertProjectTodetail($fund);
        $data = [];
        foreach ($project['fund'] as $fund){
            $data[$fund->money_from_backers] = $fund;
        }
        krsort($data);
        $num = 1;
        $result = [];
        foreach ($data as $k => $v){
            if ($num < 7){
                $result[$k] = $v;
            }
            $num++;
        }
        $project['fund']= $result;
        $project['focus'] = Helper::convertProjectTodetail($focus);
        $post = Post::take(3)->orderBy('created_at', 'desc')->get();
        // dd($arr_slide_post);
        $slide = $this->getSlider();
        return view('frontend.home', [
            'project' => $project,
            'post' => $post,
            'cate' => $cate,
            'slides' => $slide
        ]);
    }

    public function aboutWe()
    {
        $boxs = Helper::$cms_type;
        return view('frontend.cms.index', [
            "boxs" => $boxs
        ]);
    }

    public function aboutType()
    {
        $type = request()->path();

        $boxs = Helper::$cms_type;

        foreach ($boxs as $box) {
            if ($box['value'] == $type) {
                $cms_name = $box['name'];
            }
        }

        $cms = Cms::whereType($type)->orderBy('created_at')->get();
        // dd($cms);

        return view('frontend.cms.list', [
            "cms" => $cms,
            "cms_name" => $cms_name
        ]);
    }

    public function aboutTypeDetail($slug)
    {
        $cms = Cms::whereSlug($slug)->first();
        // dd($cms);
        return view('frontend.cms.detail', [
            'cms' => $cms
        ]);
    }

    public function listPost(Request $request)
    {
        $now_date = date("Y-m-d");
        $per_page = 12;
        $page = $request->page || 1;

        $posts = Post::select('id', 'image_id', 'name', 'name_en', 'created_at', 'description', 'description_en', 'slug')
            ->where(function ($q) use ($now_date) {
                $q->whereDate('publish_date', '<=', $now_date)->whereDate('expiration_date', '>', $now_date);
            })
            ->orWhere(function ($q) use ($now_date) {
                $q->whereDate('publish_date', '<=', $now_date)->whereNull('expiration_date');
            })
            ->orderBy('created_at', 'DESC')
            ->paginate($per_page);

   //      $posts = Post::select('id', 'image_id', 'name', 'created_at', 'description')
   //          ->whereDate('publish_date', '<=', $now_date)
            // ->orderBy('created_at', 'DESC')
            // ->paginate($per_page);
            
        return view('frontend.post.list_post', [
            'posts' => $posts,
            'page' => $page,
            'per_page' => $per_page
        ]);
    }

    public function showPost($id)
    {
        $post = Post::whereSlug($id)->firstOrFail();

        $random_posts = Post::select('id', 'name', 'slug')->whereNotIn('id', [$id])
            ->inRandomOrder()->take(3)->get();
        // dd($random_posts);
        return view('frontend.post.show_post', [
            'post' => $post,
            'random_posts' => $random_posts
        ]);
    }

    public function showPostByTag($tag)
    {
        $tag_name = str_replace("-", " ", $tag);
        $posts = Post::where('tags', 'like', '%'.$tag_name.'%')->get();

        return view('frontend.post.list_post', [
            'posts' => $posts,
            'page' => 0,
            'per_page' => 0,
            'hidden_load_more' => true
        ]);
    }

    public function showProject($slug_project)
    {
        // $project = Project::detail()->isOnline()->findOrFail($slug);
        $project = Project::detailMore()->isOnline()->whereSlug($slug_project)->firstOrFail();
        // dd($project);

        $plan_date = Carbon::parse($project->open_port_date)->addDays($project->plan_days);
        $now_date = Carbon::parse(Carbon::now());

        if ($plan_date->greaterThanOrEqualTo($now_date)) {
            $days_remain = $plan_date->diffInDays($now_date) + 1;
        } else {
            $days_remain = 0;
        }

        $money_from_backers = 0;
        if (count($project->backers)) {
            foreach ($project->backers as $backers) {
                $money_from_backers += $backers->amount;
            }
        }

        foreach ($project->rewards as $reward) {
            // dd($reward);
            $number_contribute = Backer::isSuccess()->whereProjectId($project->id)->whereAmount($reward->cost)->count();
            $reward->setAttribute('number_contribute', $number_contribute);
        }
        if ($project->expense) {
            $percent_progress = round($money_from_backers / $project->expense * 100, 2);
        } else {
            $percent_progress = 100;
        }
        $progress_css = ($money_from_backers > $project->expense) ? 100 : $percent_progress;
        $progress_text = $percent_progress;

        $number_created = Project::whereCreatedBy($project->created_by)->count();

        // dd($project);
        return view('frontend.project.detail', [
            'project' => $project,
            'progress_text' => $progress_text,
            'money_from_backers' => $money_from_backers,
            'days_remain' => $days_remain,
            'number_created' => $number_created
        ]);
    }

    public function mainSearch(Request $request, $type){
        $key = $type == 'web' ? $request->key_search : $request->mobile_key_search;
        $per_page = 6;
        $page = $request->page || 1;
        $summary = Project::where('name', 'like', '%'.$key.'%')->detail()->isOnline()->take($per_page)->get();
        $summary = Helper::convertProjectTodetail($summary);
        return view('frontend.service.search', ['data' => $summary, 'page' => $page, 'per_page' => $per_page, 'key' => $key]);
    }

    public function getSlider(){
        $slide = [];
        $arr_slide_project = Project::whereIsSlide(1)->orderBy('created_at', 'DESC')->get();
        $arr_slide_project = Helper::convertProjectTodetail($arr_slide_project);
        if (!empty($arr_slide_project)){
            foreach ($arr_slide_project as $asp){
                if ($asp->progress_text < 100 && $asp->days_remain > 0){
                    $slide[] = $asp;
                }
            }
        }
        /*if (count($slide) < $this->slide_limit){
            $likes = [];
            $pl = Project::with('likes')->get();
            if (!$pl->isEmpty()){
                foreach ($pl as $l){
                    if ($l->like_count > 0){
                        $likes[] = $l;
                    }
                }
                for($i=0; $i < count($likes) - 1; $i++){
                    for ($j = $i + 1; $j < count($likes); $j++){
                        if ($likes[$j]->like_count > $likes[$i]->like_count){
                            $tmp = $likes[$j];
                            $likes[$j] = $likes[$i];
                            $likes[$i] = $tmp;
                        }
                    }
                }
                $likes=count($likes) > 2 ? array_slice($likes, 0,2): $likes;
            }
            $slide = array_merge($slide, $likes);
        }*/
        if (count($slide) < $this->slide_limit) {
            $arr_slide_post = Post::select('id', 'image_id', 'description')->whereIsSlide(1)->orderBy('created_at', 'DESC')->get();
            if(!$arr_slide_post->isEmpty()){
                foreach ($arr_slide_post as $post){
                    $slide[] = $post;
                    if (count($slide) >= $this->slide_limit){
                        break;
                    }
                }
            }
        }
        return $slide;
    }

    public function prnasia()
    {
        return view('frontend.prnasia.index');
    }
}