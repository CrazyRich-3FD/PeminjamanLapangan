<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.login', ['title' => 'Login |']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if($user = Auth::user()){
                if($user->role == 'admin'){
                    return redirect()->route('Admin.index'); 
                }
                else{
                    return redirect()->route('Home.index'); 
                }
            }
        }
 
        return back()->with('loginError', 'Login failed!!');
    }
    public function logout()
    {
        Auth::logout();

        
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
    
}
