<?php
namespace App\Classes;

use App\Models\PReward;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Project;
use Auth;
use Illuminate\Support\Facades\Mail;

class Helper 
{
  static $cms_type = [
      ['name' => 'cms.VE_FUNDSTART', 'value' => 've-fundstart', 'image' => 'images/VeFundstart.jpg'],
      ['name' => 'cms.DANH_CHO_CHU_DU_AN', 'value' => 'chu-du-an', 'image' => 'images/DanhChoChuDuAn.jpg'],
      ['name' => 'cms.DANH_CHO_NGUOI_DONG_GOP', 'value' => 'nguoi-dong-gop', 'image' => 'images/DanhChoNguoiDongGop.jpg'],
      ['name' => 'cms.DIEU_KHOAN_SU_DUNG', 'value' => 'dieu-khoan-su-dung', 'image' => 'images/DieuKhoanSuDung.jpg'],
      ['name' => 'cms.LIEN_HE', 'value' => 'lien-he', 'image' => 'images/LienHe.jpg'],
      ['name' => 'cms.FAQs', 'value' => 'faqs', 'image' => 'images/FAQ.jpg']
  ];

  static $menu_code = [
    ['name' => 'Chọn vị trí link hiển thị', 'value' => ''],
    ['name' => 'Quy trình hoạt động footer', 'value' => 'qthd_footer'],
    ['name' => 'Chi phí dự án footer', 'value' => 'cpda_footer'],
    ['name' => 'Hướng dẫn dự án footer', 'value' => 'hdda_footer'],
    ['name' => 'Chính sách hoàn tiền footer', 'value' => 'csht_footer'],
    ['name' => 'Liên hệ footer', 'value' => 'lienhe_footer'],
  ];

  static function allOptionCmsType() {
    $temp = Helper::$cms_type;
    $temp = array_map(function($value) {
      $aaa = $value;
      $aaa['name'] = trans($aaa['name']);
      return $aaa;
    }, $temp);
    array_unshift($temp, ['name' => 'Chọn loại nội dung', 'value' => '']);
    return $temp;
  }

	static function validateReCaptcha($captcha) {
		$secret_key_recaptcha = config("app.RECAPTCHA_SECRET_KEY");
		// dd($secret_key_recaptcha);
      $postdata = http_build_query(
        array(
          'secret' => $secret_key_recaptcha, //secret KEy provided by google
          'response' => $captcha,                    // g-captcha-response string sent from client
          'remoteip' => $_SERVER['REMOTE_ADDR']
        )
      );

      $opts = array('http' =>
        array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => $postdata
        )
      );

      $context  = stream_context_create($opts);
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify",false,$context);
      $response = json_decode($response, true);

      if($response["success"] === true) 
      {
          return true;
      } 
      return false;
  }

  static function getYearOption()
  {
    $year = Carbon::now()->year;
    return [
      ($year-1) => ($year-1),
      $year => $year,
      ($year+1) => ($year+1),
      ($year+2) => ($year+2),
      ($year+3) => ($year+3),
      ($year+4) => ($year+4),
      ($year+5) => ($year+5),
    ];
  }

  static function getMonthOption()
  {
    return [
      '01' => 'Jan',
      '02' => 'Feb',
      '03' => 'Mar',
      '04' => 'Apr',
      '05' => 'May',
      '06' => 'Jun',
      '07' => 'Jul',
      '08' => 'Aug',
      '09' => 'Sep',
      '10' => 'Oct',
      '11' => 'Nov',
      '12' => 'Dec',
    ];
  }

  static function getDayOption()
  {
    $arr = [];
    for ($i = 1; $i <= 31; $i++) {
      $value = (string) sprintf("%02d", $i);
      $arr[$value] = $i;
    }
    // dd($arr);
    return $arr;
  }

  static function getHourOption()
  {
    $arr = [];
    for ($i = 0; $i <= 23; $i++) {
      $value = (string) sprintf("%02d", $i);
      $arr[$value] = $value;
    }
    // dd($arr);
    return $arr;
  }

  static function getMinuteOption()
  {
    $arr = [];
    for ($i = 0; $i <= 59; $i++) {
      $value = (string) sprintf("%02d", $i);
      $arr[$value] = $value;
    }
    // dd($arr);
    return $arr;
  }

  static function getUserTypeOption()
  {
    return [
      ['name' => trans('project.SEL_CA_NHAN'), 'value' => 'CA_NHAN'],
      ['name' => trans('project.SEL_CONG_TY'), 'value' => 'CONG_TY'],
    ];
  }

  static function convertProjectTodetail($projects) {
    if ($projects instanceof Collection || is_array($projects)) {
        return static::convertArrProject($projects);
    }
    return static::convertProject($projects);
  }

  static function convertArrProject($projects) {
    $data = [];
    foreach ($projects as $project) {
        $money_from_backers = 0;
      if (count($project->backers)) {
          foreach ($project->backers as $backers) {
              $money_from_backers += $backers->amount;
          }
      }
      if ($project->expense) {
          $percent_progress = round($money_from_backers / $project->expense * 100, 2);
      } else {
          $percent_progress = 100;
      }
      $progress_text = $percent_progress;

      //lấy ra số ngày còn lại
      $plan_date = Carbon::parse($project->open_port_date)->addDays($project->plan_days);
      $now_date = Carbon::parse(Carbon::now());

      if ($plan_date->greaterThanOrEqualTo($now_date)) {
          $days_remain = $plan_date->diffInDays($now_date) + 1;
      } else {
          $days_remain = 0;
      }

      $project->setAttribute('money_from_backers', $money_from_backers);
      $project->setAttribute('progress_text', $progress_text);
      $project->setAttribute('days_remain', $days_remain);

      $data[] = $project;
    }
    return $data;
  }

  static function convertProject($projects) {
    if ($projects) {
      $project = $projects;
      $money_from_backers = 0;
      if (count($project->backers)) {
          foreach ($project->backers as $backers) {
              $money_from_backers += $backers->amount;
          }
      }
      if ($project->expense) {
          $percent_progress = round($money_from_backers / $project->expense * 100, 2);
      } else {
          $percent_progress = 100;
      }
      $progress_text = $percent_progress;

      //lấy ra số ngày còn lại
      $plan_date = Carbon::parse($project->open_port_date)->addDays($project->plan_days);
      $now_date = Carbon::parse(Carbon::now());

      if ($plan_date->greaterThanOrEqualTo($now_date)) {
          $days_remain = $plan_date->diffInDays($now_date) + 1;
      } else {
          $days_remain = 0;
      }

      $project->setAttribute('money_from_backers', $money_from_backers);
      $project->setAttribute('progress_text', $progress_text);
      $project->setAttribute('days_remain', $days_remain);
      return $project;
    }
    return $projects;
  }

  static function customMail($user, $mail){
      Mail::to($user->email)->send(new $mail($user));
  }

  static function checkUserInfo(){
      if(Auth::user()){
          $user = Auth::user();
          switch ($user){
              case $user->name == null || $user->name == '':
                  return false;
                  break;
              case $user->email == null || $user->email == '':
                  return false;
                  break;
              case $user->address == null || $user->address == '':
                  return false;
                  break;
              case $user->telephone == null || $user->telephone == '':
                  return false;
                  break;
              case $user->website == null || $user->website == '':
                  return false;
                  break;
              case $user->company == null || $user->company == '':
                  return false;
                  break;
              case $user->information == null || $user->information == '':
                  return false;
                  break;
              case $user->status != 'active':
                  return false;
                  break;
              default:
                  return true;
          }
      }else{
          return false;
      }

  }

  public function coDuocDongGopDuAn($project)
  {

    $open_port_date = Carbon::parse($project->open_port_date);
    $plan_date = Carbon::parse($project->open_port_date)->addDays($project->plan_days);
    $now_date = Carbon::parse(Carbon::now());

    if ($project->is_not_open_port)
    {
      return [
        'status' => 'error',
        'message' => 'Tiếc quá, bạn không thể đóng góp cho dự án vì dự án đang đóng tính năng gọi vốn',
      ];
    }

    if ($open_port_date->greaterThan($now_date))
    {
      return [
        'status' => 'error',
        'message' => 'Tiếc quá, bạn không thể đóng góp cho dự án vì chưa đến ngày mở cổng gọi vốn!',
      ];
    }

    if ($now_date->greaterThan($plan_date)) 
    {
      return [
        'status' => 'error',
        'message' => trans('project.ERROR_CONTRIBUTE_END')
      ];
    }

    $money_from_backers = 0;
    if (count($project->backers)) 
    {
        foreach ($project->backers as $backers) 
        {
            $money_from_backers += $backers->amount;
        }
    }

    // if ($money_from_backers >= $project->expense) 
    // {
    //   return [
    //     'status' => 'error',
    //     'message' => 'Tiếc quá, bạn không thể đóng góp cho dự án vì dự án đã đủ số tiền gọi vốn',
    //   ];
    // }

    return [
        'status' => 'success',
        'message' => 'Được phép gọi vốn'
      ];
  }

  static function getReward($project_id, $value){
      $result = '';
      if ($project_id != null && $value != null){
          $data = PReward::where('project_id', $project_id)->where('cost', '<=', $value)->orderBy('cost', 'desc')->first();
          if ($data != null){
              $result = $data->description;
          }
      }
      return $result;
  }

  static function conditionSearch($summary, $condition, $per_page, $skip = 0){
      switch ($condition){
          case Project::topCapitalSearch :
              $summary = $summary->sortByDesc(function($summary){
                  return $summary->backer_money;
              });
              $summary = Helper::skipSummary($summary, $skip, $per_page);
              break;
          case Project::topPeopleCapitalSearch :
              $summary = $summary->sortByDesc(function($summary){
                  return $summary->backer_capital_count;
              });
              $summary = Helper::skipSummary($summary, $skip, $per_page);
              break;
          case Project::topPopularSearch :
              $summary = $summary->sortByDesc(function($summary){
                  return $summary->like_count;
              });
              $summary = Helper::skipSummary($summary, $skip, $per_page);
              break;
          case Project::callingCapitalCapitalSearch :
              $result = [];
              $summary = $summary->slice($skip)->take($per_page);
              $summary = Helper::convertProjectTodetail($summary);
              foreach ($summary as $d) {
                  if($d->progress_text < 100 && $d->days_remain > 0){
                      $result[$d->id] = $d;
                  }
              }
              $summary = $result;
              break;
          default :
              $summary = Helper::convertProjectTodetail($summary);
      }
      return $summary;
  }

  static function skipSummary($summary, $skip, $per_page){
      $summary = $summary->slice($skip)->take($per_page);
      return Helper::convertProjectTodetail($summary);
  }
}