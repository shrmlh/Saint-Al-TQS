<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 2)->orderBy('updated_at')->get();
        return view("admin.adminUser_modules.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.adminUser_modules.create");
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
            'firstname' => 'required|string|max:30',
            'middleInitial' => 'string|max:1',
            'lastname' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'firstname' => strtoupper($request->firstname),
            'middleInitial' => strtoupper($request->middleInitial).".",
            'lastname' => strtoupper($request->lastname),
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('createUserAdmin')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.adminUser_modules.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|string|max:30',
            'middleInitial' => 'string|max:1',
            'lastname' => 'required|string|max:30',
            'email' => [
                'required','string','email','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->update([
            'firstname' => strtoupper($request->firstname),
            'middleInitial' => strtoupper($request->middleInitial).".",
            'lastname' => strtoupper($request->lastname),
            'email' => $request->email,
        ]);
        return redirect()->route('userAdminList')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('userAdminList')
                       ->with('success','User deleted successfully.');
    }
}
