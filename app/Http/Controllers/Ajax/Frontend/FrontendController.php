<?php

namespace App\Http\Controllers\Ajax\Frontend;

use App\Classes\Helper;
use App\Models\Backer;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SubcriberRequest;

use App\Models\Post;
use App\Models\PReward;
use App\Models\Subcriber;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    protected $limit_notifi_item = 20;
    public function viewmorePost(Request $request) {
        $now_date = date("Y-m-d");
        $per_page = $request->per_page;
        
        $posts = Post::orderBy('created_at', 'DESC')
            ->where(function ($q) use ($now_date) {
                $q->whereDate('publish_date', '<=', $now_date)->whereDate('expiration_date', '>', $now_date);
            })
            ->orWhere(function ($q) use ($now_date) {
                $q->whereDate('publish_date', '<=', $now_date)->whereNull('expiration_date');
            })
            ->paginate($per_page);

        return view('frontend.post.paginate', [
            'posts' => $posts
        ]);
    }

    public function viewmoreTech($id, $time, $condition, Request $request) {
        $per_page = $request->per_page;
        $skip = $per_page * ($request->page -1);
        $summary = Project::where([]);
        if($id != 'all'){
            $summary = $summary->where(function ($query) use($id){
                $query->whereHas('category', function ($cate) use($id){
                    $cate->where('parent_id', $id);
                })->orWhere('category_id', $id);
            });
        }
        if ($time){
            if ($time != 'new' && $time != 'all'){
                $summary = $summary->whereYear('created_at', $time);
            }
        }
        if ($condition != 'all'){
            $summary = $summary->IsOnline()->detail()->get();
            $summary = Helper::conditionSearch($summary, $condition, $per_page, $skip);

        }else{
            $summary = $summary->IsOnline()->detail()->orderBy('created_at', 'desc')->skip($skip)->take($per_page)->get();
            $summary = Helper::convertProjectTodetail($summary);
        }
        $summary = Helper::convertProjectTodetail($summary);
        return view('frontend.category.paginate', [
            'cate_project' => $summary
        ]);
    }

    public function searchMoreTech($key, Request $request)
    {
        $per_page = $request->per_page;
        $skip = $per_page * ($request->page - 1);
        $summary = Project::where('name', 'like', '%'.$key.'%')->detail()->isOnline()->skip($skip)->take($per_page)->get();
        $summary = Helper::convertProjectTodetail($summary);
        return view('frontend.service.paginate', [
            'data' => $summary
        ]);
    }

    public function discoverMore(Request $request)
    {
        $per_page = $request->per_page;
        $skip = $per_page * ($request->page - 1);
        $summary = Project::detail()->isOnline()->skip($skip)->take($per_page)->get();
        $summary=Helper::convertProjectTodetail($summary);
        return view('frontend.service.paginate', [
            'data' => $summary
        ]);
    }

    public function subcribe(SubcriberRequest $request) {
    	// dd(1);
    	$sub = new Subcriber();
    	$sub->email = $request->email;
    	$sub->save();
        
        return response([
            "code" => "200", 
            "data" => 'success'
        ], 200);
    }

    public function uploadFileToProject($project_id, Request $request) {
        $this->validate($request, [
            'image' => 'max:1024',
        ]);
        Project::isOwner($project_id);
        $project = Project::findOrFail($project_id);
        Project::denieWhenNotCanEditForm($project);

        \DB::beginTransaction();
        try {
            if ($request->hasFile("image"))              
            {
                $media = Media::saveFile($request->file("image"));
                $project->media()->attach($media->id);
                \DB::commit();
                return response([
                    "status" => "success", 
                    "data" => [
                        "imageUrl" => url('/lbmediacenter') . '/' . $media->id,
                        'id' => $media->id
                    ]
                ], 200);
            }
            else {
                return response([
                    "status" => "error", 
                    "data" => []
                ], 200);
            }

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function getFileProject($project_id) {
        \DB::beginTransaction();
        try {
            $project = Project::with('media')->findOrFail($project_id);
            $medias = $project->media;

            $arr = [];
            foreach ($medias as $media) 
            {
                array_push($arr, [
                    "imageUrl" => url('/lbmediacenter') . '/' . $media->id,
                    'id' => $media->id
                ]);
            }
            
            return response([
                "status" => "success", 
                "data" => $arr
            ], 200);

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function deleteFileProject($project_id, Request $request) {
        Project::isOwner($project_id);
        $project = Project::findOrFail($project_id);
        Project::denieWhenNotCanEditForm($project);
        
        \DB::beginTransaction();
        try {
            $project->media()->detach($request->media_id);

            $media = Media::findOrFail($request->media_id);
            $media->delete();
            \DB::commit();
            
            return response([
                "status" => "success"
            ], 200);

        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function notification(){
        $result = [];
        $data = null;
        if (Auth::check()){
            $liked = Like::where('created_by',  Auth::user()->id)->where('target_type', 'App\Models\Project')->get();
            foreach ($liked as $like){
               $project_like = Project::find($like->target_id);
                if ($project_like != null){
                    $project_like_details = Helper::convertProjectTodetail($project_like);
                    $this->notifiAddData($project_like_details, 'like');
                }
           }
            $contribute = Backer::where('email', Auth::user()->email)->get();
            foreach ($contribute as $cont){
                $project_cont = Project::find($cont->project_id);
                if ($project_cont != null){
                    $project_cont_details = Helper::convertProjectTodetail($project_cont);
                    $this->notifiAddData($project_cont_details, 'contribute');
                }
            }
            $data = Notification::where('user_id', Auth::user()->id)->limit($this->limit_notifi_item)->orderBy('created_at', 'desc')->get();
            $count = 0;
            foreach ($data as $d){
                $d->url = url($d->url);
                if ($d->status == 0){
                    $count++;
                }
            }
            $result = ['count' => $count,
                        'data' => $data
                ];
        }
        return $result;
    }

    public function changeStatus(Request $request){
        if ($request->id){
            if ($request->id != null){
                $data = Notification::findOrFail($request->id);
                if ($data!=null){
                    $data->status = 1;
                    $data->save();
                    return $data;
                }

            }
        }
        return false;
    }

    public function checkContribute($reward_id){
        $reward = PReward::findOrFail($reward_id);

        $project = Project::with('backers')->findOrFail($reward->project_id);
        $helper = new Helper();
        $res = $helper->coDuocDongGopDuAn($project);

        return response()->json($res);
    }

    private function notifiAddData($details, $type){
        $title = $type == 'like' ? 'thích' : 'đóng góp';
        if($details->progress_text >= 100){
            if (Notification::where('project_id', $details->id)->where('user_id', Auth::user()->id)->where('description', 'Dự án '.$details->name. ' bạn '.$title.' đã gọi vốn thành công')->first() == null){
                $notifi = new Notification();
                $notifi->user_id = Auth::user()->id;
                $notifi->project_id = $details->id;
                $notifi->title = 'Gọi vốn thành công';
                $notifi->description = 'Dự án '.$details->name. ' bạn '.$title.' đã gọi vốn thành công';
                $notifi->url = '/du-an/'.$details->slug;
                $notifi->save();
            }
        }
        if($details->progress_text < 100 && $details->days_remain == 0){
            if (Notification::where('project_id', $details->id)->where('user_id', Auth::user()->id)->where('description', 'Dự án '.$details->name. ' bạn '.$title.' đã gọi vốn thất bại')->first() == null){
                $notifi = new Notification();
                $notifi->user_id = Auth::user()->id;
                $notifi->project_id = $details->id;
                $notifi->title = 'Gọi vốn thất bại';
                $notifi->description = 'Dự án '.$details->name. ' bạn '.$title.' đã gọi vốn thất bại';
                $notifi->url = '/du-an/'.$details->slug;
                $notifi->save();
            }
        }
        if($details->progress_text < 100 && $details->days_remain > 0){
            if (Notification::where('project_id', $details->id)->where('user_id', Auth::user()->id)->where('description', 'Dự án '.$details->name. ' bạn '.$title.' đang gọi vốn')->first() == null){
                $notifi = new Notification();
                $notifi->user_id = Auth::user()->id;
                $notifi->project_id = $details->id;
                $notifi->title = 'Đang gọi vốn';
                $notifi->description = 'Dự án '.$details->name. ' bạn '.$title.' đang gọi vốn';
                $notifi->url = '/du-an/'.$details->slug;
                $notifi->save();
            }
        }
    }

}
