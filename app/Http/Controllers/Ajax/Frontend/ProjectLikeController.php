<?php

namespace App\Http\Controllers\Ajax\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Like;
use Auth;
use Log;

class ProjectLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        $post = Project::findOrFail($post_id);
        return $post->likes;
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
    public function store(Request $request, $post_id)
    {
        $post = Project::with("liked")->findOrFail($post_id);
        if ($post->liked->count() == 0)
        {
            $like = new Like;
            $like->save();
            $post->likes()->save($like);
            return response([
                "status" => "success",
                'message' => "like"
            ]);   
        }
        else
        {
            $like = $post->liked->first();
            $like->delete();
            return response([
                "status" => "success",
                'message' => "unlike"
            ]);
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
        /*$post = Post::with("liked")->findOrFail($post_id);
        if ($post->liked->count())
        {
            $like = $post->liked->first();
            $like->delete();
        }
        return response(array("code" => "200", "description" => "Success"), 200);*/
    }
}
