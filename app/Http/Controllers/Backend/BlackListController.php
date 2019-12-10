<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BlackListRequest;
use App\Models\BlackList;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlackListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.blacklist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blacklist.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlackListRequest $request)
    {
        DB::beginTransaction();
        try {
            $blacklist = new BlackList();
            $blacklist->email = $request->email;
            $blacklist->save();
            DB::commit();
            return redirect(url('blacklists'))->with('success', 'Thêm mới email vào danh sách đen thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
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
        $users = BlackList::findOrFail($id);
        return view('backend.blacklist.add', ['user' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlackListRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $blacklist = BlackList::findOrFail($id);
            $blacklist->email = $request->email;
            $blacklist->save();
            DB::commit();
            return redirect(url('blacklists'))->with('success', 'cập nhật email thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
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
            BlackList::where('id', $id)->delete();
            DB::commit();
            return redirect(url('blacklists'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
