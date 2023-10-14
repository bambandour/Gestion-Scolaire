<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Http\Requests\Particpantrequest;
use App\Models\Classe;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(){

    }
    public function store(ParticipantRequest $request,$event_id){

        $event=Event::where('id',$event_id)->first();
        $tab=[];
        $partipants=$request->all();
        // dd($partipants);
        foreach($partipants["data"] as $participant){
            $all=Participant::create([
                'event_id' => $event->id,
                'classe_id'=>$participant['classe_id']
            ]);
        }

        $tab[]=$all;

        return response()->json($tab);

    }
}
