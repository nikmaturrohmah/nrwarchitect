<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\about;

class AboutController extends Controller
{
    public function about(Request $request)
    {
        
        // mengambil data dari table about
        if ($request->has('cari')){ $about = about::where('nama_about','like','%'.$request->cari."%")->get ();}
        else{
        $about = about::all();
        }
 
        // mengirim data petugas ke view about
        return view('/about/dataabout',['about' => $about]);
    }

    public function tambahabout()
    {
        return view('about/tambahabout');
    }

    public function simpan(Request $request)
    {
        DB::table('about')->insert([
            // 'id_about' => $request->id_about,
            'nama_about' => $request->nama_about,
            'keterangan' => $request->keterangan,
        ]);
        //alihkan ke halaman about
        return redirect('/dataabout');
    }

    public function edit($id)
    {
        $about = DB::table('about')->where('id_about',$id)->get();
        return view('/about/edit',['about' => $about]);
    }

    public function update(Request $request, $id)
    {
        DB::table('about')->where('id_about', $id, $request->id_about)->update([
            'nama_about' => $request->nama_about,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/dataabout');
    }

    public function softdel($id)
    {
        $about = about::find($id);
        $about->delete();
        return redirect('/dataabout');
    }
}
