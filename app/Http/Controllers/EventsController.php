<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;

use Calendar;

class EventsController extends Controller
{
    public function index(){
    	$events = Event::where('status', 1)->get();
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->events_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
    	}
    	$calendar_details = Calendar::addEvents($event_list); 

        return view('events.index', compact('calendar_details') );
    }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'events_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('events.index')->withInput()->withErrors($validator);
        }

        $event = new Event;
        $event->events_name = $request['events_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();

        \Session::flash('success','Event added successfully.');
        return Redirect::to('events');
    }
    public function show($id)
    {
        //
    }
 


    public function panel()
    {
        $events = Event::where('status', 0)->paginate(10);
        return view('events.panel',[
        'events' => $events,
        ]);

    }

    public function edit(Event $event)
    {
        return view('events.edit',
        [
        'event'=>$event,
        ]);
    }
    public function update(Request $request, Event $event)
    {        

        $data = $request->all();
        $data['status'] = '1';
        $event['status'] = $data['status'];
        $event->save();
        return redirect( route('events.panel') );

    }

    public function destroy()
    {
        //
    }




}


