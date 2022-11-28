<?php

namespace App\Http\Controllers;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class Calendar extends Controller
{
     public function getEvent(){
        // if(request()->ajax()){
        //     $start = (!empty($_GET["tgl_mulai"])) ? ($_GET["tgl_mulai"]) : ('');
        //     $end = (!empty($_GET["tgl_selesai"])) ? ($_GET["tgl_selesai"]) : ('');
        //     $events = SuratKeluar::whereDate('tgl_mulai', '>=', $start)->whereDate('tgl_selesai',   '<=', $end)
        //             ->get(['id','perihal','tgl_mulai', 'tgl_selesai']);
        //     return response()->json($events);
        // }
        // return view('calendar');


        $events = SuratKeluar::all( );
        $event = SuratMasuk::all( );


        return view('agenda', [
            'events' => $events,
            'event' => $event,
            'active' => 'agenda'
        ]);

    }
    // public function createEvent(Request $request){
    //     $data = $request->except('_token');
    //     $events = Event::insert($data);
    //     return response()->json($events);
    // }

    // public function deleteEvent(Request $request){
    //     $event = Event::find($request->id);
    //     return $event->delete();
    // }
}
