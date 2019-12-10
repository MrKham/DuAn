<?php

namespace App\Jobs;

use App\Mail\RegisterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $patch;
    protected $subject;
    public $tries = 5;
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $patch = 'custom.mail', $subject = '')
    {
        $this->user = $user;
        $this->patch = $patch;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        echo 'Start send email';
        $email = new RegisterMail($this->user, $this->patch, $this->subject);
        Mail::to($this->user->email)->send($email);
//        echo $this->user->email;
    }
}
