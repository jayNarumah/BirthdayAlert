<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\Profile;

class DairlyBirthdays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends the Email and Sms for today birthdays';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $day = date("d");
        $month = date("m");
        $like = "%-".$month."-" . $day . " %";

        $profiles = Profile::where('dob', 'like', $like)->get();

        foreach($profiles as $profile)
        {
            if($profile->gender == 'Male')
            {
                $gender = "He";
            }
            else{
                $gender = "She";
            }
           // try{
                $details = [
                    'name' => $profile->name,
                    'dob' => $profile->dob,
                    'gender' => $gender,

                ];
                Mail::to($profile->email)->send(new SendMail($details));
        }

    $this->info('Hourly Update has been send successfully');
    }
}
