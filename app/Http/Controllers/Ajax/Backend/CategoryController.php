<?php

namespace App\Http\Controllers\Ajax\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return Datatables::of($categories)
            ->addColumn('action', function($u) {
                $action = [];
                $action[] = \Form::lbButtonTable(
                    "category/{$u->id}/edit",
                    'get',
                    '<i class="fa fa-pencil"></i>',
                    ["class" => "btn btn-table btn-primary"]
                )->toHtml();

                $action[] = \Form::lbButtonTable(
                    "category/$u->id",
                    'delete',
                    '<i class="fa fa-trash"></i>',
                    [
                        "class" => "btn btn-table btn-danger",
                        "onclick" => "return confirm('Bạn có muốn xóa?')"
                    ]
                )->toHtml();
                return implode(' ', $action);
            })
            ->addColumn('image', function($u) {
                $action = [];
                if ($u->image_id) {
                    $action[] = '<image src="'.url('/lbmediacenter/' . $u->image_id).'"style="width: 174px; height: 135px; object-fit: cover;">';
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
