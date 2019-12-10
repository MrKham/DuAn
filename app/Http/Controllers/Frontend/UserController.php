<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\MediaRequest;
use App\Models\Backer;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use App\Http\Requests\Backend\UserRequest;
use App\Classes\Helper;
use App\Models\Media;
use App\Models\Product_favorite;
use App\Models\Category;
use App\Models\User;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->category = Category::all();
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */

    public function myProfile()
    {
        $user = Auth::user();
        return view('frontend.menu.my-profile', [
            'user' => $user,
            'category' => $this->category
        ]);
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('alert-success', 'Success');
        } else {
            $errors = new MessageBag(['old_password' => ['Wrong password']]);
            return redirect()->back()->withErrors($errors);
        }
    }

    public function postEditMedia(MediaRequest $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {
            $media = Media::saveFile(Input::file('image'));
            $user->avatar_id = $media->id;
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function profile($id)
    {
        $liked = Project::has('liked')->get();
        $liked = Helper::convertProjectTodetail($liked);
        $users = User::findOrFail($id);
        $my_project = Project::withCount('backers')->where('created_by', $id)->get();
        $my_project = Helper::convertProjectTodetail($my_project);
        $backer = Backer::where('created_by', $id)->with('project')->get();
        return view('frontend.user.profile', [
            'user' => $users, 
            'my_project' => $my_project, 
            'backer' => $backer,
            'liked' => $liked
        ]);
    }

    public function editProfile($id, UserRequest $request)
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
            DB::commit();
            return redirect()->back()->with('flash_message', 'cập nhật thông tin người dùng thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}