<?php

namespace App\Http\Resources;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function index(Request $request)
    {
        $events = new Event();
        $from = $request->from;
        $to = $request->to;

    return response()->json([
        "data" => $events->
            where("start_date", "<", $to)->
            where("end_date", ">=", $from)->get()
    ]);
    }
     public function update($id, Request $request){
       $event = Event::find($id);

       $event->text = strip_tags($request->text);
       $event->start_date = $request->start_date;
       $event->end_date = $request->end_date;
       $event->save();

       return response()->json([
           "action"=> "updated"
       ]);
   }

   public function destroy($id){
       $event = Event::find($id);
       $event->delete();

       return response()->json([
           "action"=> "deleted"
       ]);
   }
}
