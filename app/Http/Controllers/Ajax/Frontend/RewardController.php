<?php

namespace App\Http\Controllers\Ajax\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PReward;
use App\Models\Project;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rewards = PReward::whereProjectId($request->project_id)->orderBy('cost')->get();
        return response([
            "code" => "200", 
            "data" => $rewards
        ], 200);
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
        $this->validate($request, [
            'limite_number' => 'integer',
        ]);
        
        $lang = app()->getLocale();
        $project = Project::findOrFail($request->project_id);
        Project::denieWhenNotCanEditForm($project);
        
        $d = new PReward();
        $d->cost = $request->cost;
        $d->delivery_date = $request->delivery_date;
        $d->{'description_' . $lang } = $request->description;
        $d->limite_number = $request->limite_number;
        $d->project_id = $request->project_id;
        $d->is_limited = @$request->is_limited;
        $d->save();
        return response([
            "code" => "200", 
            "data" => 'success'
        ], 200);
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
        $this->validate($request, [
            'limite_number' => 'integer',
        ]);
        
        // dd($request->is_limited);
        $lang = app()->getLocale();
        $d = PReward::findOrFail($id);

        Project::denieWhenNotCanEditForm($d->project);
        $d->cost = $request->cost;
        $d->delivery_date = $request->delivery_date;
        $d->{'description_' . $lang } = $request->description;
        $d->limite_number = $request->limite_number;
        $d->project_id = $request->project_id;
        $d->is_limited = $request->is_limited;
        $d->save();
        return response([
            "code" => "200", 
            "data" => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = PReward::findOrFail($id);
        Project::denieWhenNotCanEditForm($d->project);
        $d->delete();
        return response([
            "code" => "200", 
            "data" => 'success'
        ], 200);
    }
}
