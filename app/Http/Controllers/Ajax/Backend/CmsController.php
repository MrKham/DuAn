<?php

namespace App\Http\Controllers\Ajax\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Cms;
use App\Classes\Helper;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms = Cms::orderBy('type')->get();
        return Datatables::of($cms)
            ->addColumn('action', function($u) {
                $action = [];
                $action[] = \Form::lbButtonTable(
                    "admin/cms/{$u->id}/edit",
                    'get',
                    '<i class="fa fa-pencil"></i>',
                    ["class" => "btn btn-table btn-primary"]
                )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "admin/cms/$u->id",
                    'delete',
                    '<i class="fa fa-trash"></i>',
                    [
                        "class" => "btn btn-table btn-danger",
                        "onclick" => "return confirm('Bạn có muốn xóa?')"
                    ]
                )->toHtml();
                return implode(' ', $action);
            })
            ->addColumn('location', function($u) {
                $temps = Helper::$menu_code;
                array_shift($temps);
                $type = '';
                foreach ($temps as $temp) {
                    if ($temp['value'] == $u->menu_code) {
                        $type = $temp['name'];
                        break;
                    }
                }

                return $type;
            })
            ->addColumn('type_cms', function($u) {
                $temps = Helper::$cms_type;
                $type = '';
                foreach ($temps as $temp) {
                    if ($temp['value'] == $u->type) {
                        $type = trans($temp['name']);
                        break;
                    }
                }

                return $type;
            })
            ->addColumn('image', function($u) {
                $action = [];
                if ($u->avatar_id) {
                    $action[] = '<image src="'.url('/lbmediacenter/' . $u->avatar_id).'"style="width: 174px; height: 135px; object-fit: cover;">';
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
