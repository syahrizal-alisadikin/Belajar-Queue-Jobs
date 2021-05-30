<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\SendEmail;
class SendingEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $name;
    protected $test;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data,$name,$test)
    {
        $this->data = $data;
        $this->name = $name;
        $this->test = $test;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /* Create the object of mailable class and send email */
        $emails = new SendEmail($this->data);
        // dd($emails);
        /* Set a valid email address */
       Mail::to('alisadikinsyahrizal@gmail.com')->send($emails);
    }
}
