<?php

namespace App\Console\Commands;

use App\Mail\EmailSenders;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\User;
use App\Notifications\Envoies;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MyCommand extends Command   
{
    // public $eleve;
    // public function __construct(){
    //     $eleve=$this->eleve;
    // }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendMail';   

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'envoies des emails de rappel d\'évènements';

    /**
     * Execute the console command.
     */


     public function handle()
     {
         // $event=Event::find(3);
         // $eleve= Eleve::find(6);
         // $eleve->notify(new Envoies($event,$eleve->nom));
         
        $events=Event::whereBetween('date_debut',array(now(),now()->addDay()))->first();
        foreach($events as $event){
            foreach($event->participants as $participant){
                echo('salam guys !');
            //     foreach($participant->classes->inscriptions as $std){
            //         $std->eleves->notify(new Envoies($event,$std->nom));
            //     }
            }
        }
        $this->info("Votre message a été envoyé avec succés !");
    }
}

    

    
