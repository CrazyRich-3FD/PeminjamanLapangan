<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(10);
        return view('user.user', compact('user'), ['title' => 'User |']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rid = random_int(100, 999);
        return view('user.create', compact('rid'), ['title' => 'Create User |']);
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
        $input = $request->only('iduser', 'name', 'username', 'email', 'no_hp', 'alamat', 'foto', 'role', 'password');

        if ($request->file('foto')) {
            $input['foto'] = $request->file('foto')->store('usr');
        }

        try {
            User::create($input);
            return redirect()->route('User.index')
                ->with('toast_success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', 'Error during the user created!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $u = User::findorfail($id);
        return view('user.show', compact('u'), ['title' => 'Show User |']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $u = User::findorfail($id);
        return view('user.update', compact('u'), ['title' => 'Edit User |']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto',
            'role' => 'required',
            // 'password' => 'required|confirmed',
        ]);
        $input = $request->only('iduser', 'name', 'username', 'email', 'no_hp', 'alamat', 'foto', 'role');

        if ($request->file('foto')) {
            if ($request->oldfoto) {
                Storage::delete($request->oldfoto);
            }
            $input['foto'] = $request->file('foto')->store('usr');
        }
        $u = User::findorfail($id);
        try {
            $u->update($input);
            return redirect()->route('User.index')
                ->with('toast_success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', 'Error during the user updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $u = User::findorfail($id);
        if ($u->foto) {
            Storage::delete($u->foto);
        }
        $u->delete();

        return redirect()->back()
            ->with('info', 'User deleted successfully');
    }
}
