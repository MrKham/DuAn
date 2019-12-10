<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $category = new Category();

            $category->name_en = $request->name_en;
            $category->name_vi = $request->name_vi;
            if ($request->parent != '') {
                $category->parent_id = $request->parent;
            }
            $category->description = @$request->description;
            if ($request->hasFile("image")) {
                $media = Media::saveFile($request->file("image"));
                $category->image_id = $media->id;
            }
            $category->save();
            DB::commit();
            return redirect('category')->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.add', ['data' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $category = Category::find($id);

            $category->name_en = $request->name_en;
            $category->name_vi = $request->name_vi;
            if ($request->parent != '') {
                $category->parent_id = $request->parent;
            }
            $category->description = @$request->description;
            if ($request->hasFile("image")) {
                $media = Media::saveFile($request->file("image"));
                $category->image_id = $media->id;
            }
            $category->save();
            DB::commit();
            return redirect('category')->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $projects = Category::find($id)->projects;

            if (count($projects)) {
                return redirect('category')->with('warning', 'Còn bài đăng trong danh mục');
            } else {
                Category::find($id)->delete();
            }
            DB::commit();
            return redirect('category')->with('delete', 'Xóa lĩnh vực thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
