<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cms;
use App\Models\Media;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.cms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'title' => 'required'
        ])->validate();

        \DB::beginTransaction();
        try {
            $cms = new Cms();
            $cms->title = $request->title;
            $cms->type = @$request->type;
            $cms->menu_code = @$request->menu_code;
            $cms->content = @$request->content;
            $cms->content_en = @$request->content_en;
            if ($request->hasFile("image"))              
            {
                $media = Media::saveFile($request->file("image"));
                $cms->avatar_id = $media->id;
            }
            $cms->save();
            \DB::commit();

            return redirect('admin/cms')->with([
                'flash_level' => 'success',
                'flash_message' => 'Thêm nội dung thành công'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
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
        $cms = Cms::findOrFail($id);

        return view('backend.cms.add', [
            'cms' => $cms
        ]);
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
        \Validator::make($request->all(), [
            'title' => 'required'
        ])->validate();

        \DB::beginTransaction();
        try {
            $cms = Cms::findOrFail($id);
            $cms->title = $request->title;
            $cms->type = @$request->type;
            $cms->menu_code = @$request->menu_code;
            $cms->content = @$request->content;
            $cms->content_en = @$request->content_en;
            if ($request->hasFile("image"))              
            {
                $media = Media::saveFile($request->file("image"));
                $cms->avatar_id = $media->id;
            }
            $cms->save();
            \DB::commit();

            return redirect('admin/cms')->with([
                'flash_level' => 'success',
                'flash_message' => 'Sửa nội dung thành công'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
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
            $cms = Cms::findOrFail($id);
            $cms->delete();
            \DB::commit();

            return redirect('admin/cms')->with([
                'flash_level' => 'success',
                'flash_message' => 'Xóa nội dung thành công'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e->getMessage());
        }
    }
}
