<?php

namespace App\Models;

use Alsofronie\Uuid\Uuid32ModelTrait;
use App\Classes\Helper;
use Illuminate\Database\Eloquent\Model;

class ReportProject extends Model
{
    use Uuid32ModelTrait;
    protected $table = 'report_projects';
    protected $appends = ['email', 'project_name', 'project_url'];

    const successStatus = 0;
    const failStatus = 1;

    public function projects()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function getEmailAttribute(){
        $result = null;
        if ($this->projects != null){
            if ($this->projects->created_by != null){
                $user = User::find($this->projects->created_by);
                if ($user != null){
                    $result = $user->email;
                }
            }
        }
        return $result;
    }
    public function getProjectNameAttribute(){
        $result = null;
        if ($this->projects != null){
            if ($this->projects->name != null){
                    $result = $this->projects->name;
            }
        }
        return $result;
    }

    public function getProjectUrlAttribute(){
        $result = '';
        if ($this->projects != null){
            $project_details = Helper::convertProjectTodetail($this->projects);
            $result = $project_details->slug;
        }
        return $result;
    }

    static public function boot()
    {
        ReportProject::bootUuid32ModelTrait();
    }
}
