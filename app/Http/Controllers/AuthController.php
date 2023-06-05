<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\M_Anak;
use Auth;
use Hash;

class AuthController extends Controller
{
    //

    public function _construct()
    {
        $this->middleware('guest')->except([
            'logout','dashboard'
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            //aturlah apa aja
            $request->session()->put('name',$user->nama_lengkap);
            $request->session()->put('email',$user->email);
            $request->session()->put('role',$user->role);

            return "success";
            // return redirect()->route('dashboard')->withSuccess('You have successfully login');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        if(Auth::check()) {
            $anak = M_Anak::all();

            return view('childev.guardian.dashboard.dash', compact(['anak']));
        }

        return redirect()->route('masuk')
        ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('masuk');
    }
}
