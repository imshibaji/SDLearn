<?php

namespace App\Console\Commands;

use App\Mail\Notification;
use App\Mail\PromotionalMail;
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
        //One hour is added to compensate for PHP being one hour faster 
        $now = date("Y-m-d H:i", strtotime(Carbon::now()->addHour()));
        logger($now);

        $users = User::all();
        
        // foreach($users as $user){
        //     // Mail::to($user->email)->send(new PromotionalMail($user));
        //     // Mail::to($user->email)->later($now, new PromotionalMail($user));
        //     Mail::to($user->email)->send(new PromotionalMail($user, 'Welcome [fname]', 'Hi [fname] [lname], I hope you will be okey now'));
        // }

        $user = User::find(1);
        Mail::to($user->email)->send(new PromotionalMail($user, 'Welcome [fname]', 'Hi [fname] [lname], I hope you will be okey now'));
    }
}
