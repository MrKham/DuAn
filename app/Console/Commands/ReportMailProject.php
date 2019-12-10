<?php

namespace App\Console\Commands;

use App\Classes\Helper;
use App\Jobs\SendRegisterEmail;
use App\Models\Project;
use App\Models\ReportProject;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportMailProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        DB::beginTransaction();
        try {
            $projects = Project::where('created_at', '>=', '2019-06-10 00:00:00')->IsOnline()->get();
            $project_details = Helper::convertProjectTodetail($projects);
            foreach ($project_details as $details){
                if($details->progress_text < 100 && $details->days_remain == 0){
                    if (ReportProject::where('project_id', $details->id)->where('status', ReportProject::failStatus)->first() == null){
                        $data = new ReportProject();
                        $data->project_id = $details->id;
                        $data->status = ReportProject::failStatus;
                        $data->save();
                    }
                }
                if($details->progress_text >= 100){
                    if (ReportProject::where('project_id', $details->id)->where('status', ReportProject::successStatus)->first() == null){
                        $data = new ReportProject();
                        $data->project_id = $details->id;
                        $data->save();
                    }
                }
            }
            DB::commit();
            $mail = ReportProject::where('mail_status', 0)->get();
            foreach ($mail as $m) {
                if ($m->status == ReportProject::failStatus) {
                    if ($m->email != null) {
                        dispatch(new SendRegisterEmail($m, 'custom.mails.call_capital_fail', 'Thông báo Dự án gọi vốn không thành công | Update about unsuccessful crowdfunding campaign'));
                        $m->mail_status = 1;
                        $m->save();
                    }
                }
                if ($m->status == ReportProject::successStatus) {
                    if ($m->email != null) {
                        dispatch(new SendRegisterEmail($m, 'custom.mails.call_capital_success', 'Thông báo Dự án gọi vốn thành công | Update about successful crowdfunding campaign'));
                        $m->mail_status = 1;
                        $m->save();
                    }
                }
            }
            Log::useFiles(storage_path().'/logs/cronjob/reportproject.log');
            Log::info($mail);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->info($e);
        }
    }
}
