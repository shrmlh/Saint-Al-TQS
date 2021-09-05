<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\RiderGroup;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:30',
            'middleInitial' => 'max:1',
            'lastname' => 'required|string|max:30',
            'contactno' => 'required|digits:11|numeric',
            'address'=>'required',
            'birthday'=>'required|date',
            'clubname'=>'max:30|unique:rider_groups',
            'plateno'=>'required|max:30',
            'licenseno'=>'required|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $middleInitial = $request->middleInitial;
        if(empty($middleInitial)){
            $middleInitial = "";
        }
        else{
            $middleInitial .= ".";
        }

        $clubname = $request->clubname;
        $clubid = null;
        if(!empty($clubname)){
            $clubid = RiderGroup::insertGetId(
                ['clubname' => $clubname, 'created_at' => now(),'updated_at' => now()]
            );
        }
        
        $user = User::create([
            'firstname' => strtoupper($request->firstname),
            'middleInitial' => strtoupper($middleInitial),
            'lastname' => strtoupper($request->lastname),
            'contactno' => $request->contactno,
            'address'=> strtoupper($request->address),
            'birthday'=> $request->birthday,
            'club'=> $clubid,
            'plateno'=> $request->plateno,
            'licenseno'=> $request->licenseno,
            'email' => $request->email,
            'role' => 3,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
