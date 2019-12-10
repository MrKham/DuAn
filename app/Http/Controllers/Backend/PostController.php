<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostRequest;
use App\Models\Media;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();

        $post->name = $request->name;
        $post->name_en = $request->name_en;
        $post->description = @$request->description;
        $post->description_en = @$request->description_en;
        $post->content = @$request->content;
        $post->content_en = @$request->content_en;
        $post->is_slide = $request->is_slide;
        $post->seo_title = @$request->seo_title;
        $post->seo_description = @$request->seo_description;
        $post->publish_date = $request->publish_date ? $request->publish_date : NULL;
        $post->expiration_date = $request->expiration_date ? $request->expiration_date : NULL;
        if ($request->tags) {
            $str_temp = trim($request->tags);
            $arr_explode = explode(',', $str_temp);

            $arr_explode = array_map(function($value) {
              return trim($value);
            }, $arr_explode);

            $str_temp = implode(', ', $arr_explode);
            $post->tags = $str_temp;

        }
        if ($request->hasFile("image"))              
        {
            $media = Media::saveFile($request->file("image"));
            $post->image_id = $media->id;
        }
        $post->save();

        return redirect('post')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm bài viết thành công'
        ]);  
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
        $post = Post::find($id);
        // dd($post);
        return view('backend.post.add', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // dd($request->expiration_date);
        $post = Post::find($id);

        $post->name = $request->name;
        $post->name_en = $request->name_en;
        $post->description = @$request->description;
        $post->description_en = @$request->description_en;
        $post->content = @$request->content;
        $post->content_en = @$request->content_en;
        $post->is_slide = $request->is_slide;
        $post->seo_title = @$request->seo_title;
        $post->seo_description = @$request->seo_description;
        $post->publish_date = $request->publish_date ? $request->publish_date : NULL;
        $post->expiration_date = $request->expiration_date ? $request->expiration_date : NULL;
        if ($request->tags) {
            $str_temp = trim($request->tags);
            $arr_explode = explode(',', $str_temp);

            $arr_explode = array_map(function($value) {
              return trim($value);
            }, $arr_explode);

            $str_temp = implode(', ', $arr_explode);
            $post->tags = $str_temp;

        }
        if ($request->hasFile("image"))              
        {               
            $media = Media::saveFile($request->file("image"));            
            $post->image_id = $media->id;
        }
        $post->save();

        return redirect('post')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công'
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('post')->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công'
        ]);  
    }

    public function changeSlideStatus($id)
    {
        $post = Post::findOrFail($id);
        if ($post->is_slide) {
            $post->is_slide = false;
        } else {
            $post->is_slide = true;
        }
        $post->save();

        return redirect('post')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thành công'
        ]);  
    }
}
