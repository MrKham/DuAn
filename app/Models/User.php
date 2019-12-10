<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Alsofronie\Uuid\Uuid32ModelTrait;
use LIBRESSLtd\DeepPermission\Traits\DPUserModelTrait;
use Auth;
use App\Models\LBM_conversation;
use App\Models\LBM_conversation_user;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use Uuid32ModelTrait;
    use DPUserModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'full_name', 'nickname', 'birth_day', 'id_number', 'id_date', 'email', 'avatar_id', 'password','telephone',
        'website', 'company', 'information', 'address', 'other_address', 'street', 'city', 'state', 'zip_code', 'home_number',
        'bank_name', 'bank_owner', 'bank_number', 'bank_branch', 'tax_number', 'lat', 'lng', 'facebook_id', 'google_id',
        'twitter_id', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = array('isAdmin');

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'created_by');
    }

    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');  
    }

    public function findForPassport($username)
    {
        return $this->where('name', $username)->orWhere('email', $username)->orWhere('facebook_id', $username)->first();
    }

    public function devices()
    {
        return $this->belongsToMany('App\Models\Push_device', 'push_user_devices', 'user_id', 'device_id');
    }
    

    public function orders()
    {
        return $this->belongsToMany('App\Order_status', 'Orders', 'user_id', 'status_id');
    }

    public function avatar()
    {
        return $this->belongsTo('App\Models\Media','avatar_id');
    }



   /* static findForPassport($username)
    {
        return
        // return User::where("name", $username)->orWhere("email", $username)->first();
        // return 1 user
    }*/


    static function all_to_option()
   
    {
        $items = User::get();
        $array = array();
        foreach ($items as $item)
        {
            $array[] = array("name" => $item->name, "value" => $item->id);
        }
        return $array;
    }

    public function notification($title, $description)
    {
        foreach ($this->devices as $device)
        {
            $device->send($title, $description);
        }
    }

    static function isOwn($id = null){
        if(Auth::user()){
            if($id == Auth::user()->id){
                return true;
            }
        }
        return false;
    }

    static public function boot()
    {
        User::bootUuid32ModelTrait();
    }

}
