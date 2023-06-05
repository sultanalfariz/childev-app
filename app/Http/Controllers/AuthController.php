<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\M_Anak;
use Auth;
use Hash;
use DB;

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
            $request->session()->put('uid',$user->uid);
            $request->session()->put('name',$user->nama_lengkap);
            $request->session()->put('email',$user->email);
            $request->session()->put('role',$user->role);
            $request->session()->put('foto_profil',$user->foto_profil);

            if($user->role == "Guardian"){
                return redirect()->route('dashboard')->withSuccess('You have successfully login');
            } else if($user->role == "Admin"){
                // return redirect()->route('dashboard_admin')->withSuccess('You have successfully login');
                return view('childev.admin.dashboard.dash');
            } else {
                return view('childev.landingpage.home');
            }
            // return "success";
            // return redirect()->route('dashboard')->withSuccess('You have successfully login');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        if(Auth::check()) {

            $user = Auth::user();
            $anak = M_Anak::where('uid', $user->uid)->get();

            // if ($user->role == "Guardian"){
            //     return view('childev.guardian.dashboard.dash', compact(['anak']));
            // } else if($user->role == "Admin"){
            //     return view('childev.admin.dashboard.dash');
            // }
            // else {
            //     return view('childev.landingpage.home');
            // }

            return view('childev.guardian.dashboard.dash', compact(['anak']));
            
        }

        return redirect()->route('masuk')
        ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function getDataAnak(Request $request)
    {
        $filterData = DB::table('anak')
        ->join('pertumbuhan','anak.id', '=','pertumbuhan.id_anak')
        ->select('pertumbuhan.*')
        ->where('anak.id', $request->input('selectedOption'))
        ->get();

        return response()->json($filterData);
    }

    public function getDataPerkembangan(Request $request)
    {
        $filterData = DB::table('anak')
        ->join('perkembangan','anak.id', '=','perkembangan.id_anak')
        ->select('perkembangan.*')
        ->where('anak.id', $request->input('selectedOption'))
        ->get();

        return response()->json($filterData);
    }

    public function getDataKesehatanUpdate(Request $request)
    {
        $filterData = DB::table('anak')
        ->join('kesehatan','anak.id', '=','kesehatan.id_anak')
        ->select('kesehatan.*')
        ->where('anak.id', $request->input('selectedOption'))
        ->orderBy('tanggal','desc')->limit(1)->get();

        return response()->json($filterData);
    }

    public function getDataMedisUpdate(Request $request)
    {
        $filterData = DB::table('anak')
        ->join('medis','anak.id', '=','medis.id_anak')
        ->select('medis.*')
        ->where('anak.id', $request->input('selectedOption'))
        ->orderBy('tanggal','desc')->limit(1)->get();

        return response()->json($filterData);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('masuk');
    }
}
