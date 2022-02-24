<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kontak;

class KontakController extends Controller
{
    public function kontak(Request $request)
    {
        
        // mengambil data dari table kontak
        if ($request->has('cari')){ $kontak = kontak::where('nama_kontak','like','%'.$request->cari."%")->get ();}
        else{
        $kontak = kontak::all();
        }
 
        // mengirim data petugas ke view kontak
        return view('/kontak/datakontak',['kontak' => $kontak]);
    }

    public function tambahkontak()
    {
        return view('kontak/tambahkontak');
    }

    public function simpan(Request $request)
    {
        DB::table('kontak')->insert([
            // 'id_kontak' => $request->id_kontak,
            'nama_kontak' => $request->nama_kontak,
            'no_tlpn' => $request->no_tlpn,
            'email' => $request->email,
            'fax' => $request->fax,
        ]);
        //alihkan ke halaman kontak
        return redirect('/datakontak');
    }

    public function edit($id)
    {
        $kontak = DB::table('kontak')->where('id_kontak',$id)->get();
        return view('/kontak/edit',['kontak' => $kontak]);
    }

    public function update(Request $request, $id)
    {
        DB::table('kontak')->where('id_kontak', $id, $request->id_kontak)->update([
            'nama_kontak' => $request->nama_kontak,
            'no_tlpn' => $request->no_tlpn,
            'email' => $request->email,
            'fax' => $request->fax,
        ]);
        return redirect('/datakontak');
    }

    public function softdel($id)
    {
        $kontak = kontak::find($id);
        $kontak->delete();
        return redirect('/datakontak');
    }
}
