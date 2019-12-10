<?php

namespace App\Http\Controllers\Frontend;

use App\Classes\Helper;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function searchTech(Request $request)
    {
        $cate_id = $request->parent? $request->parent : 'all';
        $time = $request->time? $request->time : 'all';
        $condition = $request->condition? $request->condition : 'all';
        $url = url('the-loai'.'/'.$cate_id.'/'.$time.'/'.$condition);
        return redirect($url)->with(['cate_id' => $cate_id, 'time' => $time, 'condition' => $condition]);
    }

    public function listTech($id, $time = null, $condition = 'all', Request $request)
    {
        $per_page = 8;
        $page = $request->page || 1;
        $time_default[] = ['name' => trans('general.MOI_NHAT'), 'value' => 'new'];
        $cate_name = 'Tất cả';
        $project = [];
        $summary = Project::where([]);
        if ($id != 'all') {
            $cate = Category::where('parent_id', $id)->pluck('id');
            $cate_name = @Category::findOrFail($id)->name;
            $summary = $summary->where('category_id', $id);
            if(!empty($cate)){
                $summary = $summary->orwhereIn('category_id', $cate);
            }
        }

        if ($time){
            if ($time != 'new' && $time != 'all'){
                $summary = $summary->whereYear('created_at', $time);
            }
        }
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
        if ($condition != 'all'){
            $summary = $summary->IsOnline()->detail()->get();
            $summary = Helper::conditionSearch($summary, $condition, $per_page, 0);

        }else{
            $summary = $summary->IsOnline()->detail()->limit($per_page)->orderBy('created_at', 'desc')->get();
            $summary = Helper::convertProjectTodetail($summary);
        }
        $focus = null;
        if (!empty($summary)){
            foreach ($summary as $s){
                $focus = $s;
                if ($s->money_from_backers > $focus->money_from_backers){
                    $focus = $s;
                }
            }
        }
        $project['summary'] = $summary;
        $project['focus'] = $focus;
        return view('frontend.category.technology', [
            'project' => $project, 'hidden' => true,
            'cate_name' => $cate_name, 'cate_id' => $id,
            'page' => $page,
            'per_page' => $per_page,
            'time' => $time,
            'condition' => $condition,
            'time_default' => $time_default]);
    }
}
