<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class eventsController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('eventDate', 'ASC')->get();
        return view('admin.events.eventsIndex')->with('events', $events);
    }

    public function addEvent()
    {
        return view('admin.events.newEvent');
    }

    public function deleteEvent($eventID)
    {
        $event = Event::findOrFail($eventID);
        $event->delete();
        return redirect()->back()->with('successMessage', 'Uspesno ste izbrisali dogodek sa menija');
    }

    public function editEventIndex($eventID)
    {
        $event = Event::findOrFail($eventID);
        return view('admin.events.editEvent')->with('event', $event);
    }

    public function editEventExe(Request $request)
    {
        $event = Event::findOrFail($request->input('eventID'));
        $event->eventName = $request->input('eventName');
        $event->eventDate = $request->input('eventDate');
        $event->eventTime = $request->input('eventTime');
        $event->eventLocation = $request->input('eventLocation');
        $event->eventDescription = $request->input('eventDescription');

        $ticketCheckbox = $request->input('ticketCheckbox');

        if ($ticketCheckbox != null) {
            $event->ticketPrice = $request->input('ticketPrice');
        }

        //get image
        $image = $request->file('eventPicture');


        if (!is_null($image)) {
            //make name for image
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $time . '-' . $request->input('eventName') . $image->getClientOriginalName();

            $event->eventPicture = $imageName;

            //move image
            $image->move(public_path('images/events'), $imageName);
        }

        $event->save();
        return redirect('/dogodki')->with('successMessage', 'Uspesno ste uredili dogodek');
    }


    //ADD NEW EVENT
    public function addEventExe(Request $request)
    {

        $event = new Event();
        $event->eventName = $request->input('eventName');
        $event->eventDate = $request->input('eventDate');
        $event->eventTime = $request->input('eventTime');
        $event->eventLocation = $request->input('eventLocation');
        $event->eventDescription = $request->input('eventDescription');

        $ticketCheckbox = $request->input('ticketCheckbox');

        if ($ticketCheckbox != null) {
            $event->ticketPrice = $request->input('ticketPrice');
        }

        //get image from form
        $image = $request->file('eventPicture');

        //make name for image
        $var = date_create();
        $time = date_format($var, 'YmdHis');
        $imageName = $time . '-' . $request->input('eventName') . $image->getClientOriginalName();

        $event->eventPicture = $imageName;

        //move image
        $image->move(public_path('images/events'), $imageName);

        $event->save();

        return redirect('/dogodki')->with('successMessage', 'Uspesno ste dodali dogodek');
    }
}
