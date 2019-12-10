<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Frontend\InitProjectRequest;
use App\Http\Requests\Frontend\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Media;
use App\Models\Backer;
use App\Classes\Helper;
use App\Classes\PaymentNapas;
use Carbon\Carbon;
use Auth;

class ProjectController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (!Helper::checkUserInfo()) {
                return redirect(url('user/profile/'. Auth::user()->id))->with([
                    'flash_level' => 'danger',
                    'flash_message_v2' => 'Bạn phải điền đủ thông tin cá nhân để tạo dự án'
                ]);

            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.project.khoi_tao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InitProjectRequest $request)
    {
        \DB::beginTransaction();
        try {
            $project = new Project();
            $project->name = $request->name;
            $project->category_id = @$request->category_id;
            if ($request->category_name) {
                $project->category_name = trim($request->category_name);
            }
            $project->status = 'draft';
            $project->save();
            \DB::commit();
            return redirect(url('du-an/'.$project->id.'/edit'));
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Project::isOwner($id);
        
        $project = Project::info()->findOrFail($id);
        if ($project->status == 'delete') {
            abort(404, "Not Found");
        }
        // dd($project);
        return view('frontend.project.edit', [
            'project' => $project,
            'is_can_edit_form' => Project::isCanEditForm($project)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        Project::isOwner($id);
        $project = Project::findOrFail($id);
        Project::denieWhenNotCanEditForm($project);
        
        \DB::beginTransaction();
        try {
            $lang = app()->getLocale();

            // dd($request->user_introduce_member);
            $request_opd = $request->open_port_date;
            //basic
            $project->name = $request->name;
            $project->category_id = @$request->category_id;
            if ($request->category_name) {
                $project->category_name = trim($request->category_name);
            }
            $project->expense = $request->expense;
            $project->plan_days = $request->plan_days;
            $project->registration_service = $request->registration_service;
            $project->open_port_date = $request_opd['year'].'-'.$request_opd['month'].'-'.$request_opd['day'].' '.$request_opd['hour'].':'.$request_opd['minute'].':00';
            $project->is_not_open_port = @$request->is_not_open_port;

            //description
            if ($request->hasFile("avatar"))              
            {
                $media = Media::saveFile($request->file("avatar"));            
                $project->avatar_id = $media->id;
            }
            $project->{'headline_' . $lang } = @$request->headline;
            $project->video_url = @$request->video_url;
            $project->{'about_project_' . $lang } = @$request->about_project;
            $project->{'project_plan_' . $lang } = @$request->project_plan;
            $project->{'project_use_' . $lang } = @$request->project_use;

            //user owner
            $project->user_company_name = @$request->user_company_name;
            $project->user_position = @$request->user_position;
            $project->user_address = @$request->user_address;
            $project->user_phone_number = @$request->user_phone_number;
            $project->user_email = @$request->user_email;
            $project->user_bank_owner = @$request->user_bank_owner;
            $project->user_bank_number = @$request->user_bank_number;
            $project->user_bank_name = @$request->user_bank_name;
            $project->user_bank_branch = @$request->user_bank_branch;
            $project->user_tax_number = @$request->user_tax_number;
            $project->{'user_introduce_member_' . $lang } = @$request->user_introduce_member;
            $project->save();
            \DB::commit();
            return redirect(url("du-an/$id/edit"))->with([
                'flash_level' => 'success',
                'flash_message' => 'Cập nhật dự án thành công'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function duyetDuAn(Request $request) {
        $project = Project::findOrFail($request->project_id);
        if ($project->status !== 'online') 
        {
            $project->status = 'approved';
            $project->save();
        }

        return view('frontend.project.duyet_du_an');
    }

    public function previewDuAn(Request $request) {
        $project = Project::detailMore()->findOrFail($request->project_id);

        $plan_date = Carbon::parse($project->open_port_date)->addDays($project->plan_days);
        $now_date = Carbon::parse(Carbon::now());

        if ($plan_date->greaterThanOrEqualTo($now_date)) {
            $days_remain = $plan_date->diffInDays($now_date) + 1;
        } else {
            $days_remain = 0;
        }

        // dd($project);
        return view('frontend.project.preview', [
            'project' => $project,
            'progress_css' => 0,
            'progress_text' => 0,
            'money_from_backers' => 0,
            'days_remain' => $days_remain,
        ]);
    }
}
