<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRules;
use Illuminate\Http\Request;

class EventRulesController extends Controller
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
            'event' => 'required',
            'rule' => 'required',
        ]);
        EventRules::create($request->all());
       
        return redirect()->route('showEventRule',$request->event)->with('success','New rule has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event_modules.eventrules.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventRules $eventrule)
    {
        return view('admin.event_modules.eventrules.edit',compact('eventrule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventRules $eventrule)
    {
        $request->validate([
            'rule' => 'required',
        ]);

        $eventrule->update($request->all());

        return redirect()->route('showEventRule',$eventrule->event)->with('success','Rule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventRules $eventrule)
    {
        $eventrule->delete();
        return redirect()->route('showEventRule',$eventrule->event)
                       ->with('success','Rule deleted successfully.');
    }
}
