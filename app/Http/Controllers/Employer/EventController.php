<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{
    public function index(Request $request)
    {

        $events = new Event();
        $from = $request->from;
        $to = $request->to;
        return response()->json([
            "data" => $events->
                where("start_date", "<", $to)->where("end_date", ">=", $from)->get()
        ]);
    }
    public function store(Request $request)
    {
        return json_encode(true);
    }
    public function update($id, Request $request)
    {
        dd($request);
       $event = Event::find($id);
       $event->text = strip_tags($request->text);
       $event->start_date = $request->start_date;
       $event->end_date = $request->end_date;
       $event->save();
       return response()->json([
           "action"=> "updated"
       ]);
   }

    public function destroy($id)
    {
       $event = Event::find($id);
       $event->delete();
       return response()->json(
            [
           "action"=> "deleted"
       ]);
   }
}
