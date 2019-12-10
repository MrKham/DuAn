<?php

namespace App\Http\Controllers\Ajax\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PUpdate;
use App\Models\Project;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $updates = PUpdate::whereProjectId($request->project_id)->orderBy('created_at')->get();
        return response([
            "code" => "200", 
            "data" => $updates
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
        $lang = app()->getLocale();
        $project = Project::findOrFail($request->project_id);
        Project::denieWhenNotCanEditForm($project);
        
        $d = new PUpdate();
        $d->{'title_' . $lang } = $request->title;
        $d->{'content_' . $lang } = $request->content;
        $d->project_id = $request->project_id;
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
        $lang = app()->getLocale();
        $d = PUpdate::findOrFail($id);
        Project::denieWhenNotCanEditForm($d->project);
        
        $d->{'title_' . $lang } = $request->title;
        $d->{'content_' . $lang } = $request->content;
        $d->project_id = $request->project_id;
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
        $d = PUpdate::findOrFail($id);
        Project::denieWhenNotCanEditForm($d->project);
        $d->delete();
        return response([
            "code" => "200", 
            "data" => 'success'
        ], 200);
    }
}
