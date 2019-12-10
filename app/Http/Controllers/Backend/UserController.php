<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserRequest;
use App\Models\Role;
use App\Models\User_role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Media;
use App\Models\Conversations;
use App\Models\LBM_conversation;
use Auth, Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            if ($user->status != 'active') {
                $user->status = 'active';
                $user->save();
                DB::commit();
                Auth::login($user);

                return redirect('/')->with([
                    'flash_level' => 'success',
                    'flash_message' => 'Bạn đã kích hoạt tài khoản thành công. Chào mứng bạn đến với fundstart'
                ]);
            } else {
                return redirect()->route('home');
            }
            
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User;
            $user->name = $request->name;
            $user->address = $request->address;
            $user->company = $request->company != null ||  $request->company != '' ? $request->company : null ;
            $user->telephone = $request->telephone_o;
            $user->email = $request->email;
            $user->website = $request->website != '' ? $request->website : null;
            $user->information = $request->info != '' ? $request->info : null;
            $user->password = bcrypt($request->password);
            if ($request->hasFile('avatar')) {
                $media = Media::saveFile(Input::file('avatar'));
                $user->avatar_id = $media->id;
            }
            $user->save();
            if ($request->role){
                $user->roles()->sync($request->role);
            }
            DB::commit();
            return redirect(url('user'))->with('success', 'Thêm mới người dùng thành công');
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
    public function show($user_id)
    {
        $conversation = User::findOrFail($user_id)->conversations->first();
        if (isset($conversation->id)) {
            $conversation_id = $conversation->id;
            return redirect(url("lbmessenger/conversation/$conversation_id/item"));
        } else {
            $conversation = new LBM_conversation;
            $conversation->save();
            $conversation->users()->sync([Auth::user()->id, $user_id]);
            $conversation_id = $conversation->id;
            return redirect(url("lbmessenger/conversation/$conversation_id/item"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('backend.user.add', ['user' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->address = $request->address;
            $user->company = $request->company != null ||  $request->company != '' ? $request->company : null ;
            $user->telephone = $request->telephone_o;
            $user->email = $request->email;
            $user->website = $request->website != '' ? $request->website : null;
            $user->information = $request->info != '' ? $request->info : null;
            if ($request->has("password") && strlen($request->password) > 0) {
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('avatar')) {
                $media = Media::saveFile(Input::file('avatar'));
                $user->avatar_id = $media->id;
            }
            $user->save();
            if ($request->role){
                $user->roles()->sync($request->role);
            }
            DB::commit();
            return redirect(url('user'))->with('success', 'cập nhật thông tin người dùng thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        return redirect(url('/user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'delete';
        $user->save();
        return redirect(url('user'));
    }

    public function getEnable(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->enable == 1) {
            $user->enable = 0;
        } else {
            $user->enable = 1;
        }
        $user->save();
        return redirect()->back();
    }

    public function export()
    {
        $users = User::select('id', 'email', 'name')->get();
        $arr = [["ID", "Email", "Name"]];
        foreach ($users as $user) {
            array_push($arr, [
                $user->id, $user->email, $user->name
            ]);
        }
        // dd($arr);
        Excel::create('export_users', function($excel) use ($arr) {

            $excel->sheet('sheet 1', function($sheet) use ($arr) {

                $sheet->fromArray($arr);

            });

        })->export('xlsx');
    }

}
