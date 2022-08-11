<?php

namespace App\Console\Commands;

use App\Mail\CloudEmailTest;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\SlackTest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailToAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command send email to all user of system';

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
     * @return int
     */
    public function handle()
    {
        $users = User::first();
        Mail::to('Cloudways@Cloudways.com')->send(new CloudEmailTest());
        // $users->notify(new OrderNotification("Saib", "Your Account has been created"));
        // $users->notify(new SlackTest());


        // foreach ($users as $item) {
        //     Mail::raw("Testing email function", function ($message) use ($item) {
        //         $message->from("test-app@gmail.com");
        //         $message->to($item->email);
        //     });
        // }
    }
}
