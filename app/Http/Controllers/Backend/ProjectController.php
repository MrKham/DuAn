<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.project.index');
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            $project = Project::findOrFail($id);
            $project->status = 'delete';
            $project->is_slide = false;
            $project->save();
            \DB::commit();

            return redirect('admin/project')->with([
                'flash_level' => 'success',
                'flash_message' => 'Xóa dự án thành công'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function putToOnline($id)
    {
        \DB::beginTransaction();
        try {
            $project = Project::findOrFail($id);
            $category = Category::whereNameVi($project->category_name)->get();
            if (count($category) == 0 && $project->category_name) {
                $cate = new Category();
                $cate->name = $project->category_name;
                $cate->save();
            }
            $project = Project::findOrFail($id);
            $project->status = 'online';
            $project->save();

            \DB::commit();

            return redirect('admin/project')->with([
                'flash_level' => 'success',
                'flash_message' => 'Duyệt dự án lên online thành công'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function sendToDraft($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'draft';
        $project->save();

        return redirect('admin/project')->with([
            'flash_level' => 'success',
            'flash_message' => 'Chuyển dự án về dự thảo thành công'
        ]);  
    }

    public function sendToApproved($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'approved';
        $project->save();

        return redirect('admin/project')->with([
            'flash_level' => 'success',
            'flash_message' => 'Chuyển dự án về trạng thái người dùng đã duyệt thành công'
        ]);  
    }

    public function changeSlideStatus($id)
    {
        $project = Project::findOrFail($id);
        if ($project->is_slide) {
            $project->is_slide = false;
        } else {
            $project->is_slide = true;
        }
        $project->save();

        return redirect('admin/project')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thành công'
        ]);  
    }

    public function changeEditFormStatus($id)
    {
        $project = Project::findOrFail($id);
        $check = $project->disable_edit_info;
        if ($project->disable_edit_info) {
            $project->disable_edit_info = false;
        } else {
            $project->disable_edit_info = true;
        }
        $project->save();

        return redirect('admin/project')->with([
            'flash_level' => 'success',
            'flash_message' => $project->disable_edit_info ? 'Khóa sửa thông tin dự án thành công' : 'Đã có thể sửa thông tin dự án'
        ]);
    }

    public function focus($id)
    {
        $project = Project::findOrFail($id);
        $focus_project = Project::whereNotNull('focus')->get();
        if ($project->focus) {
            $project->focus = false;
        } else {
            $project->focus = true;
            foreach ($focus_project as $p) 
            {
                $p->focus = false;
                $p->save();
            }
        }
        $project->save();

        return redirect('admin/project')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thành công'
        ]);  
    }

    public function export()
    {
        $projects = Project::with('creator', 'likes.creator')->orderBy('created_at', 'DESC')->get();
        // dd($projects);
        $arr = [];
        foreach ($projects as $project) 
        {
            $array = [];
            $array['Email người tạo'] = $project->creator ? $project->creator->email : '';
            $array['Tên dự án'] = $project->name;
            $array['Thời gian tạo'] = $project->created_at;
            $array['Dịch vụ đăng ký'] = ($project->registration_service == 'GOI_VON') ? 'Gọi vốn cộng đồng' : 'Giới thiệu ý tưởng';
            $array['Tình trạng'] = $project->status;

            $user_like = [];
            foreach ($project->likes as $like) 
            {
                if ($like->creator)
                {
                    array_push($user_like, $like->creator->email);
                }
            }
            $array['Danh sách email những user thích dự án'] = implode(', ', $user_like);
            array_push($arr, $array);
        }
        // dd($arr);
        Excel::create('export_projects', function($excel) use ($arr) {

            $excel->sheet('sheet 1', function($sheet) use ($arr) {

                $sheet->fromArray($arr);

            });
        })->export('xlsx');
    }

}
