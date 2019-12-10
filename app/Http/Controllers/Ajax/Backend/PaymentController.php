<?php

namespace App\Http\Controllers\Ajax\Backend;

use App\Classes\Helper;
use App\Jobs\SendRegisterEmail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Backer;
use App\Classes\PaymentNapas;
use Auth;

class PaymentController extends Controller
{
    public function sendMailRefundAllTransactionInProject(Request $request){
        if (!Auth::user()->hasRole('admin'))
        {
            abort(503, "Permission denied");
        }
        $user = Project::findOrFail($request->project_id);
        $data = [];
        if ($user != null){
            $data['email'] =  'admin@fundstart.vn';
            $data['name'] =  $user->name;
            $data['url'] =  url('/ajax/refund-all-transaction-in-project/'.$user->id);
            $data = (object)$data;
            dispatch(new SendRegisterEmail($data, 'custom.mails.mail-refund', 'Refund dự án'));
            return response([
                "status" => 'success',
            ], 200);
        }
        return response([
            "status" => 'fail',
        ], 200);

    }
    public function refundAllTransactionInProject($id)
    {
    	if (!Auth::user()->hasRole('admin')) 
    	{
            abort(503, "Permission denied");
        }

    	$project = Project::with('backers')->findOrFail($id);

    	$backers = $project->backers;
    	$payment = new PaymentNapas();

    	foreach ($backers as $backer)
    	{
    		$info = [
    			'vpc_Amount' => $backer->amount,
    			'vpc_MerchTxnRef' => $backer->transaction_ref,
    			'vpc_TransactionNo' => $backer->transaction_no,
    			'vpc_CardType' => $backer->card_type,
    		];
    		$payment->refund($info);
    	}

    	return redirect(url('/admin/backer'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Xác nhận refund toàn toàn bộ các giao dịch của dự án '. $project->name. ' thành công'
        ]);
    }

    public function refundOneTransactionInProject($id) 
    {
        if (!Auth::user()->hasRole('admin')) 
        {
            abort(503, "Permission denied");
        }

        $backer = Backer::findOrFail($id);

        $payment = new PaymentNapas();

        $info = [
            'vpc_Amount' => $backer->amount,
            'vpc_MerchTxnRef' => $backer->transaction_ref,
            'vpc_TransactionNo' => $backer->transaction_no,
            'vpc_CardType' => $backer->card_type,
        ];

        $payment->refund($info);
        return redirect(url('admin/backer'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Gửi yêu cầu hoàn tiền thành công'
        ]);  
    }

    public function markRefundAllTransactionInProject(Request $request) 
    {
    	//refunded
    	if (!Auth::user()->hasRole('admin')) 
    	{
            abort(503, "Permission denied");
        }

    	$backers = Backer::whereProjectId($request->project_id)->whereStatus('successful')->get();

    	foreach ($backers as $backer) 
    	{
    		\DB::beginTransaction();
            try {
	    		$backer->status = 'refunded';
	    		$backer->save();
                $check_user = User::where('email', $backer->email)->first();
                if ($check_user != null){
                    $project = Project::findOrFail($backer->project_id);
                    if ($project != null){
                        $project_details = Helper::convertProjectTodetail($project);
                        $this->addNotifi($project_details, $check_user->id);
                    }
                }
	    		\DB::commit();
                // add notification
            } catch (\Exception $e) {
                \DB::rollBack();
                return response([
		            "status" => 'error',
		            "message" => $e->getMessage()
		        ], 200);
            }
    	}

    	return response([
            "status" => 'success'
        ], 200);


    }
    private function addNotifi($details, $user){
//        if (Notification::where('project_id', $details->id)->where('user_id', $user)->where('description', 'Bạn vừa được hoàn tiền đóng góp của Dự án'.$details->name)->first() == null){
            $notifi = new Notification();
            $notifi->user_id = $user;
            $notifi->project_id = $details->id;
            $notifi->title = 'Hoàn tiền đóng góp dự án';
            $notifi->description = 'Bạn vừa được hoàn tiền đóng góp của Dự án '.$details->name;
            $notifi->url = '/du-an/'.$details->slug;
            $notifi->save();
//        }
    }
}
