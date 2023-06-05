<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Anak;

class AnakController extends Controller
{
    //

    public function index()
    {
        return view('childev.guardian.dashboard.add_child');
    }

    public function create(Request $req)
    {
        $data = new M_Anak();
        $data->nama_anak = $req->name;
        $data->tanggal_lahir = $req->date_birth;
        $data->jenis_kelamin = $req->gender;
        $data->save();

        return redirect()->route('dashboard')->withSuccess('Successfully added');
    }

}
