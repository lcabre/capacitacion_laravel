<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function pruebadispatch()
    {
//        TestEvent::dispatch("hola");
        event(new TestEvent("hola"));
    }

    public function ajaxcall(Request $request){
//        dd($request->all());
        return response()->json(["success"=> false], 400);
    }
}
