<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendRegisterEmail;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Backend\RegisterRequest;
use App\Classes\Helper;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(RegisterRequest $request)
    {
        \DB::beginTransaction();
        try {
            // $captcha = $request->input('g-recaptcha-response');
            // if (Helper::validateReCaptcha($captcha)) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->input('r-email');
                $user->password = bcrypt($request->input('r-password'));
                $user->save();
                \DB::commit();
                dispatch(new SendRegisterEmail($user, 'custom.mail', 'Đăng ký tài khoản thành công'));
            return redirect('register')->with([
                    'flash_level' => 'success',
                    'flash_message' => 'Đăng ký thành công, vui lòng kiểm tra mail để kích hoạt tài khoản'
                ]);
            // } else {
            //     return redirect(url('/register'));
            // }
        } catch (\Exception $e) {
            \DB::rollBack();
            return ['status' => 500,
                'error' => $e->getMessage()];
        }
    }
}
