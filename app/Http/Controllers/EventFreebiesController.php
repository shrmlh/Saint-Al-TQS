<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventFreebies;
use Illuminate\Http\Request;

class EventFreebiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.event' => 'required',
            'addMoreInputFields.*.freebie' => 'required',
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            EventFreebies::create($value);
        }

        return back()->with('success','New freebie has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event_modules.eventfreebies.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventFreebies $eventfreebie)
    {
        return view('admin.event_modules.eventfreebies.edit',compact('eventfreebie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventFreebies $eventfreebie)
    {
        $request->validate([
            'freebie' => 'required',
        ]);

        $eventfreebie->update($request->all());

        return redirect()->route('showEventFreebie',$eventfreebie->event)->with('success','Freebie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventFreebies $eventfreebie)
    {
        $eventfreebie->delete();
        return redirect()->route('showEventFreebie',$eventfreebie->event)
                       ->with('success','Freebie deleted successfully.');
    }
}
