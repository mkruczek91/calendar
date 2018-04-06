<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Calendar;
use App\Event;
use Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EventsController extends Controller
{
    public function index(Request $request){
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
        
        $eventsuser = Event::with('users')->where('status', 1)->where('users_id', $request->user()->id)->get();

        return view('events.index', compact('calendar_details'),[
            'eventsuser' => $eventsuser,
        ] );
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
        $event->users_id = $request->user()->id;
        $event->save();


        \Session::flash('success','Propozycja dodana pomyslnie, czekaj na akceptacje');
        return Redirect::to('events');
    }
    public function show($id)
    {
        //
    }
 


    public function panel()
    {
      
        $events = Event::with('users')->where('status', 0)->paginate(10);
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

    public function destroy(Request $request,Event $event)
    {
        $eventsuser = Event::with('users')->where('status', 0)->where('users_id', $event->users_id)->get()[0]['users']->email;
        $title = $event->events_name;
        $start = $event->start_date;
        $end = $event->end_date;

        Mail::send('emails.send', ['title'=>$title,'start'=>$start,'end'=>$end], function ($message) use ($eventsuser)
        {
            $message->from('admin@admin.com', 'Pan Admin');
            $message->to($eventsuser);
        });

        $event->delete();
        return redirect( route('events.panel'));
    }



    public function termin()
    {
      
        $events = Event::with('users')->where('status', 1)->paginate(10);
        return view('events.termin',[
        'events' => $events,
        ]);

    }

    public function callendar()
    {
        $events = [];
        $data = Event::with('users')->where('status', 1)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value['users']->name .' - '. $value->events_name,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
                        'color' => '#f05050',
                        'textColor' => '#fff',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('events.fullcalender', compact('calendar'));
    }
    

}


