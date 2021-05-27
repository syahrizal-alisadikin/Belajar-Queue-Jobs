<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
class SendingNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    protected $name;
    protected $test;

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
        dd($this->test,$this->name,$this->data);
        Http::withHeaders([
                        'Content-Type' => 'application/json',
                    ])->post('https://app.wapibot.com/api/send/text', [
                        "apikey" => "1ae03344ce589a74eeb28826ef25b6fd95cafcc0",
                        "to" => $this->data['phone'],
                        "message"  => "testing laravel Jobs"
                    ]);
    }
}
