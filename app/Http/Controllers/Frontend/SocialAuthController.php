<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;
use App\Models\Media;

class SocialAuthController extends Controller
{
    public function redirectFb()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFb()
    {   
        $user = Socialite::driver('facebook')->user();
        // dd($user);
        $id = $user->id;
        $u = User::whereSocialId($id)->whereSocialType('facebook')->first();
        if ($u)
        {
            Auth::login($u);
            return redirect()->route('home');
        }
        else 
        {
            $u = User::where('email', $user->email)
                ->whereNotNull('email')
                ->first();
            if ($u)
            {
                $dd = $u;
            }
            else
            {
                $dd = new User;
            }
            if ($user->avatar_original) {
                $media = Media::download_file($user->avatar_original);
                $dd->avatar_id = $media->id;
            }
            $dd->name = $user->name;
            $dd->email = $user->email;
            $dd->social_id = $id;
            $dd->social_type = 'facebook';
            $dd->status = 'active';
            $dd->save();
            Auth::login($dd);
            return redirect()->route('home');
        }
    }

    public function redirectGG()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGG()
    {
        
        $user = Socialite::driver('google')->user();
        // dd($user);
        $id = $user->id;
        $u = User::whereSocialId($id)->whereSocialType('google')->first();
        if ($u)
        {
            Auth::login($u);
            return redirect()->route('home');
        }
        else 
        {
            $u = User::where('email', $user->email)
                ->whereNotNull('email')
                ->first();
            if ($u)
            {
                $dd = $u;
            }
            else
            {
                $dd = new User;
            }
            if ($user->avatar_original) {
                $media = Media::download_file($user->avatar_original);
                $dd->avatar_id = $media->id;
            }
            $dd->name = $user->name;
            $dd->email = $user->email;
            $dd->social_id = $id;
            $dd->social_type = 'google';
            $dd->status = 'active';
            $dd->save();
            Auth::login($dd);
            return redirect()->route('home');
        }
    }

    // public function redirecttwitter()
    // {
    //     return Socialite::driver('twitter')->redirect();
    // }
    
        
    // public function callbacktwitter()
    // {
    //     // when facebook call us a with token
    //     $user = Socialite::driver('twitter')->user();
    //     $id = $user->id;
    //     $u = User::where('provider_id',$id)->where('provider','twitter')->get()->first();
    //     // dd($bb);
    //     if ($u){
    //         Auth::login($u);
    //         return redirect()->route('home');
    //         // return 1;
    //     }
    //     else {
    //         $dd = new User;
    //         $dd->name = $user->name;
    //         $dd->provider="twitter";
    //         $dd->provider_id = $id;
    //         $dd->save();
    //         Auth::login($dd);
    //         return redirect()->route('home');
    //     }
        
    // }



}
