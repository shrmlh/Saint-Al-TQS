<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;

class StationController extends Controller
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
            'addMoreInputFields.*.assigned_user' => 'required',
            'addMoreInputFields.*.station' => 'required',
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            Station::create($value);
        }
       
        return back()->with('success','New station has been added successfully.');
    }

    // Fetch records
    public function getUsers(Request $request){
        $users = [];
        $response = array();
        if ($request->has('term')) {
            $search = $request->term;
            if ($search != '') {
                $users = User::orderby('lastname', 'asc')
                    ->select('id', 'lastname', 'firstname', 'middleInitial')
                    ->where('lastname','like','%' .$search . '%')
                    ->orWhere('firstname','like','%' .$search . '%')
                    ->orWhere('middleInitial','like','%' .$search . '%')
                ->get();
            }
            foreach ($users as $user) {
                $response[] = array(
                    "id"=>$user->id,
                    "text"=>$user->lastname.", ".$user->firstname." ".$user->middleInitial.""
                );
            }
        }
        
        return response()->json($response); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event_modules.eventstations.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $eventstation)
    {
        return view('admin.event_modules.eventstations.edit',compact('eventstation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $eventstation)
    {
        $request->validate([
            'station' => 'required',
        ]);

        $eventstation->update($request->all());

        return redirect()->route('showEventStation',$eventstation->event)->with('success','Station updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $eventstation)
    {
        $eventstation->delete();
        return redirect()->route('showEventStation',$eventstation->event)
                       ->with('success','Station deleted successfully.');
    }
}
