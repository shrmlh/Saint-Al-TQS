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
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'addMoreInputFields.*.firstname' => 'required|string|max:30',
            'addMoreInputFields.*.middleInitial' => 'max:1',
            'addMoreInputFields.*.lastname' => 'required|string|max:30',
            'addMoreInputFields.*.contactno' => 'required|digits:11|numeric',
            'addMoreInputFields.*.address'=>'required',
            'addMoreInputFields.*.birthday'=>'required|date',
            'addMoreInputFields.*.plateno'=>'required|max:30',
            'addMoreInputFields.*.licenseno'=>'required|max:30|distinct|unique:users',
            'addMoreInputFields.*.email' => 'required|string|email|max:255|distinct|unique:users',
            'addMoreInputFields.*.password' => ['required', 'confirmed', 'min:8'],
        ]);
        
        if(count($request->addMoreInputFields)>1){
            $validator->sometimes('clubname', 'required|max:30|unique:rider_groups', function($input) {
                return $input;
            });
        }
    
         if ($validator->passes()) {
       
             $clubname = $request->clubname;
             $clubid = null;
             if (!empty($clubname) && count($request->addMoreInputFields)>1) {
                 $clubid = RiderGroup::insertGetId(
                     ['clubname' => $clubname, 'created_at' => now(),'updated_at' => now()]
                 );
             }

             foreach ($request->addMoreInputFields as $key => $value) {
                $middleInitial = $request->addMoreInputFields[$key]["middleInitial"];
                if (empty($middleInitial)) {
                    $middleInitial = "";
                } else {
                    $middleInitial .= ".";
                }
                 User::create([
                    'firstname' => strtoupper($request->addMoreInputFields[$key]["firstname"]),
                    'middleInitial' => strtoupper($middleInitial),
                    'lastname' => strtoupper($request->addMoreInputFields[$key]["lastname"]),
                    'contactno' => $request->addMoreInputFields[$key]["contactno"],
                    'address'=> strtoupper($request->addMoreInputFields[$key]["address"]),
                    'birthday'=> $request->addMoreInputFields[$key]["birthday"],
                    'club'=> $clubid,
                    'plateno'=> $request->addMoreInputFields[$key]["plateno"],
                    'licenseno'=> $request->addMoreInputFields[$key]["licenseno"],
                    'email' => $request->addMoreInputFields[$key]["email"],
                    'role' => 3,
                    'password' => Hash::make($request->addMoreInputFields[$key]["password"]),
                ]);
            }
            return response()->json(['success'=>'Account/s created successfully.']);
         }
         return response()->json(['error'=>$validator->errors()]);
    }
}
