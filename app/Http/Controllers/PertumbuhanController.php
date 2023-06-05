<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Pertumbuhan;
use App\Models\M_Anak;
use Auth;
use Hash;
use DB;

class PertumbuhanController extends Controller
{

    public function pertumbuhan()
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

            return view('childev.guardian.pertumbuhan.main', compact(['anak']));
            
        }

        return redirect()->route('masuk')
        ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function index()
    {
        return view('childev.guardian.pertumbuhan.add_pertumbuhan');
    }

    public function addPertumbuhan(Request $req)
    {
        $data = new Pertumbuhan();
        $data->id_anak = $req->id_anak;
        $data->tinggi = $req->tinggi;
        $data->berat = $req->berat;
        $data->lingkar_kepala = $req->lingkar_kepala;
        $data->usia = $req->usia;
        $data->save();

        return redirect()->route('dashboard')->withSuccess('Successfully added');
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

    public function getDataPertumbuhan(Request $request)
    {
        $filterData = DB::table('anak')
        ->join('pertumbuhan','anak.id', '=','pertumbuhan.id_anak')
        ->select('pertumbuhan.*')
        ->where('anak.id', $request->input('selectedOption'))
        ->orderBy('id','desc')->limit(1)->get();

        return response()->json($filterData);
    }
}
