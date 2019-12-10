<?php

namespace App\Http\Controllers\Frontend;

use App\Classes\Helper;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 'all', $time = null, $condition = 'all', Request $request)
    {
        $time_default = [
            ['name' => trans('general.MOI_NHAT'), 'value' => 'new'],
        ];
        $year = Project::detail()->isOnline()->get();
        if (!$year->isEmpty()) {
            foreach ($year as $s)
                $time_default[] = [
                    'name' => $s->created_at->format('Y'),
                    'value' => $s->created_at->format('Y')
                ];
            $time_default[] =  ['name' => '2018', 'value' => '2018'];
            $time_default[] =  ['name' => '2017', 'value' => '2017'];
            $time_default[] =  ['name' => '2016', 'value' => '2016'];
            $time_default[] =  ['name' => '2015', 'value' => '2015'];
        }
        $cate_name = 'Tất cả';
        $per_page = 6;
        $page = $request->page || 1;
        $summary = Project::detail()->isOnline()->take($per_page)->orderBy('created_at', 'desc')->get();
        $summary = Helper::convertProjectTodetail($summary);
        return view('frontend.discover.index', [
            'data' => $summary,
            'page' => $page,
            'per_page' => $per_page,
            'time' => $time,
            'condition' => $condition,
            'cate_name' => $cate_name, 'cate_id' => $id,
            'time_default' => $time_default,
            'key' => $request->key_search]);
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
