<?php

namespace App\Http\Controllers\Ajax\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::orderBy('created_at', 'DESC')->whereNotNull('status')->get();
        return Datatables::of(Project::query())
            ->addColumn('action', function($u) {
                $action = [];

                if ($u->is_slide) {
                    $btn_slide = "Hủy Slideshow";
                } else {
                    $btn_slide = "Slideshow trang chủ";
                }

                if ($u->focus) {
                    $focus_option = [
                        'icon' => '<i class="fa fa-gg-circle" aria-hidden="true"></i>',
                        'title' => 'Dự án đang là tiêu điểm',
                        'mess' => "return confirm('Hủy dự án tiêu điểm?')"
                    ];
                } else {
                    $focus_option = [
                        'icon' => '<i class="fa fa-circle" aria-hidden="true"></i>',
                        'title' => 'Dự án chưa là tiêu điểm',
                        'mess' => "return confirm('Đặt dự án làm dự án tiêu điểm?')"
                    ];
                }

                if ($u->disable_edit_info) {
                    $edit_form = [
                        'icon' => '<i class="fa fa-unlock"></i>',
                        'mess' => "return confirm('Bạn có chắc chắn mở khóa chức năng sửa thông tin dự án?')"
                    ];
                } else {
                    $edit_form = [
                        'icon' => '<i class="fa fa-lock"></i>',
                        'mess' => "return confirm('Bạn có chắc chắn khóa chức năng sửa thông tin dự án?')"
                    ];
                }

                $action[] = '<div style="display: table-cell;"><a style="margin-right: 5px; margin-bottom: 5px;" href="/du-an/'.$u->id.'/edit" title="Sửa" target="_blank" class="btn btn-table btn-primary"><i class="fa fa-pencil"></i></a></div>';
                
                // $action[] = \Form::lbButtonTable(
                //     "du-an/{$u->id}/edit",
                //     'get',
                //     '<i class="fa fa-pencil"></i>',
                //     ["class" => "btn btn-table btn-primary"]
                // )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "admin/project/$u->id",
                    'delete',
                    '<i class="fa fa-trash"></i>',
                    [
                        "class" => "btn btn-table btn-danger",
                        "title" => "Xóa",
                        "onclick" => "return confirm('Bạn có muốn xóa?')"
                    ]
                )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "admin/project/".$u->id."/change-edit-form-status",
                    'post',
                    $edit_form['icon'],
                    [
                        "class" => "btn btn-table btn-info",
                        "title" => "Khóa, mở sửa thông tin dự án",
                        "onclick" => $edit_form['mess']
                    ]
                )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "admin/project/".$u->id."/focus",
                    'post',
                    $focus_option['icon'],
                    [
                        "class" => "btn btn-table btn-success",
                        "title" => $focus_option['title'],
                        "onclick" => $focus_option['mess']
                    ]
                )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "admin/project/".$u->id."/send-to-draft",
                    'post',
                    'Draft',
                    [
                        "class" => "btn btn-table btn-primary",
                        "onclick" => "return confirm('Bạn có muốn chuyển dự án về trạng thái dự thảo?')"
                    ]
                )->toHtml();
                
                $action[] = \Form::lbButtonTable(
                    "admin/project/".$u->id."/put-to-online",
                    'post',
                    'Online',
                    [
                        "class" => "btn btn-table btn-primary",
                        "onclick" => "return confirm('Bạn có muốn đăng dự án lên online?')"
                    ]
                )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "admin/project/".$u->id."/send-to-approved",
                    'post',
                    'Approved',
                    [
                        "class" => "btn btn-table btn-primary",
                        "onclick" => "return confirm('Bạn có muốn chuyển dự án về trạng thái người dùng đã duyệt?')"
                    ]
                )->toHtml();

                $action[] = \Form::lbButton(
                    "admin/project/".$u->id."/change-slide-status",
                    'post',
                    $btn_slide,
                    [
                        "class" => "btn btn-table btn-danger",
                    ]
                )->toHtml();

                return implode(' ', $action);
            })
            ->addColumn('name', function($u) {
                $action = [];
                $action[] = '<a href="'.route('project_detail', ['slug_project'=>$u->slug]).'" target="_blank">'.$u->name.'</a>';

                return implode(' ', $action);
            })
            ->addColumn('slide_home', function($u) {
                $action = [];
                if ($u->is_slide) {
                    $action[] = '<p style="text-align: center;">X</p>';
                }

                return implode(' ', $action);
            })
            ->make(true);
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
        //
    }
}
