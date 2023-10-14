<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function index(){
        $events=Event::all();
        return EventResource::collection($events);
    }
    public function store(Request $request){
        $event = new Event;
        $event->nom = $request->nom;
        $event->description = $request->description;
        $event->user_id = $request->user_id;
        $event->date_debut=now();
        $event->save();
        return[
            "statusCode" => Response::HTTP_OK,
            "message" => "l'evenement a été ajouté avec succés !",
            "data"=>$event
        ];
    }
}
