<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeNotification;
use App\Models\Companies;


class SendWelcomeNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public Companies $comapnies;

    /**
     * Create a new job instance.
     */
    public function __construct($comapnies)
    {
        $this->comapnies = $comapnies;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //  $companies = $this->companies;

        Notification::send($this->comapnies, new WelcomeNotification($this->comapnies));

    }
}
