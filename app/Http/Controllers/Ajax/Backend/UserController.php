<?php

namespace App\Http\Controllers\Ajax\Backend;

use App\Classes\Helper;
use App\Http\Requests\Backend\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Facades\Datatables;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $remember = $request->remember_me_login ? true : false;
        $user = User::where('email', $request->email)->first();
        if ($user != null){
            if ($user->status != 'active'){
                return 'Tài khoản chưa được kích hoạt';
            }
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return 'success';
        }
        if (!User::where('email', $request->email)->first()) {
            return 'Email không đúng';
        }
        if (!User::where('email', $request->email)->where('password', bcrypt($request->password))->first()) {
            return 'Mật khẩu không đúng';
        }
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->input('r-email');
            $user->password = bcrypt($request->input('r-password'));
            $user->save();
            DB::commit();
            Helper::customMail($user,'\App\Mail\RegisterMail');
            return ['status' => 200,
                    'data' => $user];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => 500,
                'error' => $e->getMessage()];
        }
    }

    public function index()
    {
        // $users = User::all();
        return Datatables::of(User::query())
            ->addColumn('action', function ($u) {
                $action = [];
                $action[] = '<div style="display: inline-flex"><div>' . \Form::lbButton(
                        "/user/{$u->id}/edit",
                        'get',
                        '<i class="fa fa-pencil"></i>',
                        ["class" => "btn btn-table btn-primary"]
                    )->toHtml() . '</div>';
                $action[] = '<div style="margin-left: 2px">' . \Form::lbButton(
                        "/user/$u->id",
                        'delete',
                        '<i class="fa fa-trash"></i>',
                        [
                            "class" => "btn btn-table btn-danger",
                            "onclick" => "return confirm('Are you sure?')"
                        ]
                    )->toHtml() . '</div> </div>';
                return implode(' ', $action);
            })
            ->editcolumn('avatar', function ($u) {
                return '<img src="' . url($u->avatar_id != null ? '/lbmedia/' . $u->avatar_id : asset('/uploads/avatar/default.png')) . '" width=70px>';
            })
            ->editcolumn('phone', function ($u) {
                return $u->phone != null ? $u->phone : '';
            })
            ->editcolumn('website', function ($u) {
//                return $u->website != null ? '<a href="https' . $u->website . '" target="_blank">' . $u->website . '</a>' : '';
                return $u->website != null ? $u->website : '';
            })
            ->make(true);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
