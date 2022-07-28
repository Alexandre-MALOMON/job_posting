<?php

namespace App\Jobs;

use App\Mail\JobPosterMail;
use App\Models\Emploie;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Jobsendmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $created_job;
    public $usersjobs;
    public $secteur;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Emploie $job ,$usersjobs,$secteur)
    {
        $this->created_job=$job;
        $this->usersjobs =$usersjobs;
        $this->secteur = $secteur;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ( $this->usersjobs as $usersjob) {
                if ($usersjob->activite == $this->secteur) {
                   Mail::to($usersjob->email)->send(new JobPosterMail($this->created_job));
                }else{
                    echo "Bonjour";
                }

       }
    }
}
