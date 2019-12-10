<?php

namespace App\Http\Controllers\Ajax\Backend;

use App\Models\BlackList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class BlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = BlackList::all();
        return Datatables::of($users)
            ->addColumn('action', function ($u) {
                $action = [];
                $action[] = '<div style="display: inline-flex"><div>' . \Form::lbButton(
                        "blacklists/{$u->id}/edit",
                        'get',
                        '<i class="fa fa-pencil"></i>',
                        ["class" => "btn btn-table btn-primary"]
                    )->toHtml() . '</div>';
                $action[] = '<div style="margin-left: 2px">' . \Form::lbButton(
                        "blacklists/$u->id",
                        'delete',
                        '<i class="fa fa-trash"></i>',
                        [
                            "class" => "btn btn-table btn-danger",
                            "onclick" => "return confirm('Are you sure?')"
                        ]
                    )->toHtml() . '</div> </div>';
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
