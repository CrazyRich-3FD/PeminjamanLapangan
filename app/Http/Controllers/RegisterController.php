<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rid = random_int(100, 999);
        return view('user.register',compact('rid'), ['title' => 'Register |']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'name' => 'required',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email:dns|unique:users',
            'no_hp' => 'required|unique:users',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg|image',
            'role' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);
        $input = $request->only('iduser','name','username','email','no_hp','alamat','foto','role','password');

        if ($request->file('foto')) {
            $input['foto'] = $request->file('foto')->store('usr');
        }

        User::create($input);

        return redirect()->route('Login.index')
        ->with('success', 'Registration successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
