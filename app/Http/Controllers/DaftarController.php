<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Hash;

class DaftarController extends Controller
{
    
    function daftar(Request $request)
    {
        $data = new Pengguna();
        $data->nama_lengkap = $request->nama_lengkap;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->confirm_password = Hash::make($request->confirm_password);
        $data->nik = $request->nik ?? "Kosong";
        $data->tanggal_lahir = $request->tanggal_lahir ?? "2023-01-01";
        $data->alamat = $request->alamat ?? "Kosong";
        $data->jenis_kelamin = $request->jenis_kelamin ?? "Kosong";
        $data->no_hp = $request->no_hp ?? "Kosong";
        $data->foto_profil = $request->foto_profil ?? "user.png";
        $data->role = "Guardian";
        $data->save();

        return view('landingpage.home');
    }
}
