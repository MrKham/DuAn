<?php

namespace App\Console\Commands;

use App\Jobs\SendRegisterEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendMailManual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:manual';

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
        $data = User::where('status', 'freeze')->get();
        if (!$data->isEmpty()){
            foreach ($data as $d){
                dispatch(new SendRegisterEmail($d, 'custom.mail', 'Đăng ký tài khoản thành công'));
            }
        }
        Log::info('Đã gửi mail xong');
    }
}
