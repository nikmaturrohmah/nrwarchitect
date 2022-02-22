<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\profile;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        
        // mengambil data dari table profile
        if ($request->has('cari')){ $profile = profile::where('nama_profile','like','%'.$request->cari."%")->get ();}
        else{
        $profile = profile::all();
        }
 
        // mengirim data petugas ke view profile
        return view('/profile/dataprofile',['profile' => $profile]);
    }

    public function tambahprofile()
    {
        return view('profile/tambahprofile');
    }

    public function simpan(Request $request)
    {
        DB::table('profile')->insert([
            // 'id_profile' => $request->id_profile,
            'nama_profile' => $request->nama_profile,
            'umur_profile' => $request->umur_profile,
            'karier' => $request->karier,
            'domisili' => $request->domisili,
            'motto' => $request->motto,
        ]);
        //alihkan ke halaman profile
        return redirect('/dataprofile');
    }

    public function edit($id)
    {
        $profile = DB::table('profile')->where('id_profile',$id)->get();
        return view('/profile/edit',['profile' => $profile]);
    }

    public function update(Request $request, $id)
    {
        DB::table('profile')->where('id_profile', $id, $request->id_profile)->update([
            'nama_profile' => $request->nama_profile,
            'umur_profile' => $request->umur_profile,
            'karier' => $request->karier,
            'domisili' => $request->domisili,
            'motto' => $request->motto,
        ]);
        return redirect('/dataprofile');
    }

    public function softdel($id)
    {
        $profile = profile::find($id);
        $profile->delete();
        return redirect('/dataprofile');
    }
}
