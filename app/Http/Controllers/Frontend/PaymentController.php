<?php

namespace App\Http\Controllers\Frontend;

use App\Jobs\SendRegisterEmail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\PReward;
use App\Models\Backer;
use App\Classes\Helper;
use App\Classes\PaymentNapas;
use Uuid, Cache, Auth;


class PaymentController extends Controller
{
	public function contribute($reward_id)
    {
        $reward = PReward::findOrFail($reward_id);

        $project = Project::with('backers')->findOrFail($reward->project_id);
        $helper = new Helper();
        $res = $helper->coDuocDongGopDuAn($project);
        if ($res['status'] !== 'success')
        {
            return $res['message'] . ' <br> <a href="'. route("project_detail", ["slug_project" => $project->slug]) .'">Về trang dự án</a>';
        }

        $user = Auth::user();

        return view('frontend.project.contribute', [
            'reward' => $reward,
            'user' => $user
        ]);
    }

	public function postContribute(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|integer',
            'telephone' => 'required|numeric',
            'email_backers' => 'required',
            'address' => 'required',
        ]);
        $p_reward = PReward::findOrFail($request->reward_id);

        $store_cache = $request->all();
        $store_cache['total_money'] = $p_reward->cost * $request->number;

        //check dc dong gop
        $project = Project::with('backers')->findOrFail($p_reward->project_id);

        $helper = new Helper();
        $res = $helper->coDuocDongGopDuAn($project);
        if ($res['status'] !== 'success')
        {
            return $res['message'] . ' <br> <a href="'. route("project_detail", ["slug_cat" => $project->category_slug, "slug_project" => $project->slug]) .'">Về trang dự án</a>';
        }

        $payment = new PaymentNapas();

        $orderUuid = $payment->generateUUIDAndCache($store_cache);

        $data = [
            'vpc_Amount' => $p_reward->cost * 100 * $request->number,
            'vpc_OrderInfo' => 'Đóng góp cho dự án ' . $project->name,
            'vpc_MerchTxnRef' => $orderUuid,
            'vpc_BackURL' => route('project_contribute', ['slug' => $p_reward->id]),
            'vpc_ReturnURL' => route('payment_finish', ['slug' => $project->id]),

        ];
        // dd($payment->urlRedirectGateway($data));
        return redirect($payment->urlRedirectGateway($data));


    }

    public function paymentFinish($project_id, Request $request)
    {
        // $p_reward = PReward::findOrFail($reward_id);
        $project = Project::findOrFail($project_id);

        $data = $request->all();
        // dd($data);

        $payment = new PaymentNapas();

        $req = Cache::get($data['vpc_MerchTxnRef']);

        if ($payment->checkOrderValid($data['vpc_MerchTxnRef']))
        {
            if ($payment->checkSecureHash($data))
            {
                if ($payment->checkResponseCode($data))
                {
                    \DB::beginTransaction();
                    try {
                        $backer = new Backer();
                        $backer->project_id = $project_id;
                        $backer->amount = $req['total_money'];
                        $backer->transaction_no = $data['vpc_TransactionNo'];
                        $backer->transaction_ref = $data['vpc_MerchTxnRef'];
                        $backer->card_type = @$data['vpc_CardType'];
                        $backer->name = @$req['name'];
        				$backer->email = @$req['email_backers'];
                        $backer->address = @$req['address'];
                        $backer->telephone = @$req['telephone'];
        				$backer->status = 'successful';
                        $backer->save();
                        \DB::commit();
                        $user = User::where('email', $backer->email)->first();
                        if ($user != null){
                            $notifi = new Notification();
                            $notifi->user_id = $user->id;
                            $notifi->project_id = $backer->project_id;
                            $notifi->title = 'Đóng góp dự án thành công';
                            $notifi->description = 'Bạn đã đóng góp '.$backer->amount. ' vào dự án '. $project->name;
                            $notifi->url = 'notifi-contribute';
                            $notifi->save();
                        }
                        $payment->paymentSuccess($data['vpc_MerchTxnRef']);
                        dispatch(new SendRegisterEmail($backer, 'custom.mails.contribute_success', 'Thông báo đóng góp Dự án thành công | Update about successful contribute campaign'));
                        return redirect(route('payment_success', [
                        	'slug' => $project->slug
                        ]));

                    } catch (\Exception $e) {
                        \DB::rollBack();
                        dd($e->getMessage());
                    }
                }
                else
                {
                    return 'Có lỗi xảy ra';
                }
            }
            else
            {
                return 'Có lỗi xảy ra';
            }
        }
        else
        {
            return 'Hết hạn phiên giao dịch';
        }
    }

    public function paymentSuccess($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        return view('frontend.project.payment_success', [
            'project' => $project
        ]);
    }

    public function getListImage($string) 
    {
        while (strpos($string, '/uploads/redactor_rails/picture')) {
            $s_begin = strpos($string, '/uploads/redactor_rails/picture');
            $s_end = strpos($string, '"', $s_begin);
            $sub_str = substr($string, $s_begin, $s_end - $s_begin);

            $url = 'http://fundstart.vn' . $sub_str;
            $name = substr($url, strrpos($url, '/') + 1);

            //co download
            $contents = file_get_contents($url);
            file_put_contents(public_path('upload/images/' . $name), $contents);
            //end

            $string = str_replace($sub_str . '"', "/upload/images/" . $name . '" style="width: 100%;"', $string);
        }
        return $string;
    }

    public function getListImageNotChangeStyle($string) 
    {
        while (strpos($string, '/uploads/redactor_rails/picture')) {
            $s_begin = strpos($string, '/uploads/redactor_rails/picture');
            $s_end = strpos($string, '"', $s_begin);
            $sub_str = substr($string, $s_begin, $s_end - $s_begin);

            $url = 'http://fundstart.vn' . $sub_str;
            $name = substr($url, strrpos($url, '/') + 1);

            //co download
            $contents = file_get_contents($url);
            file_put_contents(public_path('upload/images/' . $name), $contents);
            //end

            $string = str_replace($sub_str . '"', "/upload/images/" . $name . '" style=""', $string);
        }
        return $string;
    }

    public function user_convert()
    {
        // $a = \DB::table('users')->get();
        // Cache::forever('users_table', $a);
        // dd('save_done');


        // $bs = Cache::get('users_table');
        // // dd($bs);
        // foreach ($bs as $b) 
        // {
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new User();
        //         $cat->id = md5($b->id);
        //         $cat->name = $b->name;
        //         $cat->full_name = $b->full_name;
        //         $cat->nickname = $b->nickname;
        //         $cat->birth_day = NULL;
        //         $cat->id_number = $b->id_number;
        //         $cat->email = $b->email;
        //         $cat->password = $b->encrypted_password;
        //         $cat->telephone = $b->phone_number;
        //         $cat->website = $b->website;
        //         $cat->company = $b->company;
        //         $cat->information = $b->bio;
        //         $cat->address = $b->address_complement;
        //         $cat->status = 'active';
        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        dd('convert_done');
    }

    public function category_convert()
    {
        // $a = \DB::table('categories')->get();
        // Cache::forever('categories_table', $a);
        // dd('save_done');


        // $bs = Cache::get('categories_table');
        // foreach ($bs as $b) 
        // {
        //     $image_url = 'http://www.fundstart.vn/uploads/category/photo/'.$b->id.'/'.$b->photo;
        //     $media = Media::download_file($image_url);
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new Category();
        //         $cat->id = md5($b->id);
        //         $cat->parent_id = $b->parent_id ? md5($b->parent_id) : NULL;
        //         $cat->description = $b->desc_html;
        //         $cat->image_id = $media->id;
        //         $cat->name = $b->name;
        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        // dd('convert_done');
    }

    public function project_convert()
    {
        ini_set('max_execution_time', 240);
        ini_set('memory_limit', '-1');

        // $a = \DB::table('projects')->get();
        // Cache::forever('projects_table', $a);
        // dd('save_done');


        // $bs = Cache::get('projects_table');
        // foreach ($bs as $b) 
        // {
        //     $image_url = 'http://www.fundstart.vn/uploads/project/uploaded_image/'.$b->id.'/'.$b->uploaded_image;
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new Project();
        //         $cat->id = md5($b->id);
        //         $cat->name = $b->name;
        //         $cat->category_id = $b->category_id ? md5($b->category_id) : NULL;
        //         $cat->expense = $b->goal;
        //         $cat->plan_days = $b->online_days;
        //         $cat->open_port_date = $b->day_for_payment;
        //         // $cat->user_type = NULL;
        //         // $cat->user_company_name = NULL;
        //         // $cat->user_position = NULL;
        //         if ($b->uploaded_image) 
        //         {
        //             $media = Media::download_file($image_url);
        //             $cat->avatar_id = $media->id;
        //         }
        //         $cat->headline = $b->headline;
        //         $cat->video_url = $b->video_url;
        //         $cat->about_project = $this->getListImage($b->about_html);
        //         $cat->project_plan = $this->getListImage($b->project_plan);
        //         $cat->project_use = $this->getListImage($b->project_use);
        //         $cat->status = $b->state;
        //         $cat->created_by = $b->user_id ? md5($b->user_id) : NULL;
        //         $cat->is_slide = $b->show_in_slide ? true : false;
        //         $cat->slug = $b->slug;
        //         $cat->registration_service = 'GOI_VON';
        //         $cat->is_not_open_port = $b->opened_for_payment ? false : true;
        //         $cat->disable_edit_info = $b->is_locked ? true : false;

        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        dd('convert_done');
    }

    public function reward_convert()
    {
        // $a = \DB::table('rewards')->orderBy('row_order')->get();
        // Cache::forever('rewards_table', $a);
        // dd('save_done');


        // $bs = Cache::get('rewards_table');
        // // dd($bs);
        // foreach ($bs as $b) 
        // {
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new PReward();
        //         $cat->id = md5($b->id);
        //         $cat->project_id = $b->project_id ? md5($b->project_id) : NULL;
        //         $cat->cost = $b->minimum_value;
        //         $cat->description = $b->description;
        //         $cat->delivery_date = $b->deliver_at;
        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        // dd('convert_done');
    }

    public function update_convert()
    {
        // $a = \DB::table('project_posts')->get();
        // Cache::forever('updates_table', $a);
        // dd('save_done');


        $bs = Cache::get('updates_table');
        // dd($bs);
        // foreach ($bs as $b) 
        // {
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new PUpdate();
        //         $cat->id = md5($b->id);
        //         $cat->project_id = $b->project_id ? md5($b->project_id) : NULL;
        //         $cat->title = $b->title;
        //         $cat->content = $b->comment_html;
        //         $cat->created_at = $b->created_at;
        //         $cat->updated_at = $b->updated_at;
        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        dd('convert_done');
    }

    public function backer_convert()
    {
        // $a = \DB::table('transactions')->get();
        // Cache::forever('backers_table', $a);
        // dd('save_done');


        // $bs = Cache::get('backers_table');
        // // dd($bs);
        // foreach ($bs as $b) 
        // {
        //     \DB::beginTransaction();
        //     try {
        //         $res = json_decode($b->response);
        //         $card_type = isset($res) ? $res->vpc_CardType: NULL;

        //         $reward = PReward::find(md5($b->reward_id));
        //         $project_id = isset($reward->project_id) ? $reward->project_id : NULL;

        //         $cat = new Backer();
        //         $cat->id = md5($b->id);
        //         $cat->project_id = $project_id;
        //         $cat->created_by = $b->user_id ? md5($b->user_id) : NULL;
        //         $user = User::find($cat->created_by);
        //         $cat->name = isset($user) ? $user->name : NULL;
        //         $cat->email = isset($user) ? $user->email : NULL;
        //         $cat->amount = $b->amount;
        //         $cat->address = $b->deliver_address;
        //         $cat->address = $b->deliver_address;
        //         $cat->created_at = $b->created_at;
        //         $cat->updated_at = $b->updated_at;
        //         $cat->transaction_no = $b->transaction_no;
        //         $cat->transaction_ref = $b->transaction_ref;
        //         $cat->status = ($b->status == 'success') ? 'successful' : $b->status;
        //         $cat->card_type = $card_type;

        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        dd('convert_done');
    }

    public function subcriber_convert()
    {
        // $a = \DB::table('subcribers')->get();
        // Cache::forever('subcribers_table', $a);
        // dd('save_done');


        // $bs = Cache::get('subcribers_table');
        // // dd($bs);
        // foreach ($bs as $b) 
        // {
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new Subcriber();
        //         $cat->id = md5($b->id);
        //         $cat->email = $b->email;
        //         $cat->created_at = $b->created_at;
        //         $cat->updated_at = $b->updated_at;
        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        dd('convert_done');
    }

    public function post_convert()
    {
        // ini_set('max_execution_time', 240);
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->slug = str_slug($post->name);
            $post->save();
        }
        dd(1);

        // $articles = \DB::table('articles')->orderBy('created_at','desc')->get();
        // foreach ($articles as $article) {
        //     $tags = \DB::table('taggings')->whereTaggableId($article->id)->get();
        //     // dd($tags);
        //     $arr = [];
        //     foreach ($tags as $tag) {
        //         $tags_data = \DB::table('tags')->whereId($tag->tag_id)->first();
        //         // array_push($arr, $tags_data);

        //         array_push($arr, $tags_data->name);
        //     }

        //     $article->tags = $arr;
        // }
        // Cache::forever('posts_table', $articles);
        // dd('save_done');


        // $bs = Cache::get('posts_table');
        // // dd($bs[0]);
        // foreach ($bs as $b) 
        // {
        //     // $image_url = 'http://www.fundstart.vn/uploads/project/uploaded_image/'.$b->id.'/'.$b->uploaded_image;
        //     $image_url = 'http://www.fundstart.vn/uploads/article/photo/'.$b->id.'/article_thumb_'.$b->photo;
        //     try {
        //         $media = Media::download_file($image_url);
        //         $image_id = $media->id;
        //     } catch (\Exception $e) {
        //         $image_id = NULL;
        //     }
        //     \DB::beginTransaction();
        //     try {
        //         $cat = new Post();
        //         $cat->id = md5($b->id);
        //         $cat->name = $b->title;
        //         $cat->description = $b->seo_description;
        //         $cat->content = $this->getListImageNotChangeStyle($b->content_html);
        //         $cat->seo_title = $b->seo_title;
        //         $cat->seo_description = $b->seo_description;
        //         $cat->publish_date = $b->publish_date;
        //         $cat->tags = implode(', ', $b->tags);
        //         $cat->created_at = $b->created_at;
        //         $cat->updated_at = $b->updated_at;
        //         $cat->created_by = $b->user_id ? md5($b->user_id) : NULL;
        //         $cat->updated_by = NULL;

        //         if ($b->photo) 
        //         {
        //             $cat->image_id = $image_id;
        //         }

        //         $cat->save();

        //         \DB::commit();
        //     } catch (\Exception $e) {
        //         \DB::rollBack();
        //         dd($e->getMessage());
        //     }
        // }
        // dd('convert_done');
    }
}
