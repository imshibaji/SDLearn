<?php

namespace App\Console\Commands;


use App\Mail\PromotionalMail;
use App\Models\Notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command description';

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
        $notifications = Notification::all();
        $users = User::all();
        $this->email_sender($notifications, $users);

        // $user = User::find(1);
        // Mail::to($user->email)->send(new PromotionalMail($user, 'Welcome [fname]', 'Hi [fname] [lname], I hope you will be okey now'));
    }

    private function email_sender($notifications, $users){
        $check = false;
        //One hour is added to compensate for PHP being one hour faster 
        // $now = date("Y-m-d H:i", strtotime(Carbon::now()->addHour()));
        $now = strtotime(Carbon::now());
        logger($now);

        foreach($notifications as $notify){
        
            if(strtotime($notify->sending_time) < $now){
                if(($notify->notify_type == 'all' || $notify->notify_type == 'email') && $notify->sending_status == 'no'){
                    foreach($users as $user){
                        if(($user->user_type == $notify->user_type) || ($notify->user_type == 'all')){
                            if(($notify->premium_type == 'none') || ($notify->premium_type == $user->premium_type)){
                                Mail::to($user->email)->send(new PromotionalMail($user, $notify->title, $notify->details));
                                $check = true;
                            }
                        }
                    }
                    if($check){
                        $notify->sending_status = 'yes';
                        $notify->save();
                    }
                }
            }
        }
    }
}
