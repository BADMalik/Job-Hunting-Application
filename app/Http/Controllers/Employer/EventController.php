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
        $user_id = (((int)$request->user_id));
        $from = $request->from;
        $to = $request->to;
        return response()->json([
            "data" => $events->
                where("start_date", "<", $to)->where("end_date", ">=", $from)->where('user_id','=',$user_id)->get()
        ]);
    }
    public function home()
    {
        return view('employer.scheduler.scheduler');
    }
    public function store(Request $request)
    {
        // dd($request->start_date);
        if($request->text !=="" && isset($request->text)) {
            // echo'adawd';die;
            Event::create([
                'user_id'=>$request->userId,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'text'=>$request->text,
                'applicant_id' => 0,
                'job_id' => 0,
                'application_id' => 0
            ]);
        }
        return json_encode(true);
    }
    public function update($id, Request $request)
    {
       $event = Event::find($id);
       $event->text = strip_tags($request->text);
       $event->start_date = $request->start_date;
       $event->end_date = $request->end_date;
       $event->save();
       return response()->json([
           "action"=> "updated",
           "event" =>$event
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
