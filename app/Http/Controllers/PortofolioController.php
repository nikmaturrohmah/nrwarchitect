<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\portofolio;

class PortofolioController extends Controller
{
    public function portofolio(Request $request)
    {
        
        // mengambil data dari table portofolio
        if ($request->has('cari')){ $portofolio = portofolio::where('name','like','%'.$request->cari."%")->get ();}
        else{
        $portofolio = portofolio::all();
        }
 
        // mengirim data petugas ke view portofolio
        return view('/portofolio/dataportofolio',['portofolio' => $portofolio]);
    }

    public function tambahportofolio()
    {
        return view('portofolio/tambahportofolio');
    }

    public function simpan(Request $request)
    {
        DB::table('portofolios')->insert([
            // 'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'panjang_lahan' => $request->panjang_lahan,
            'lebar_lahan' => $request->lebar_lahan,
            'luas_lahan' => $request->luas_lahan,
            'luas_bangunan' => $request->luas_bangunan,
            'jumlah_lantai' => $request->jumlah_lantai,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
        ]);
        //alihkan ke halaman portofolio
        return redirect('/dataportofolio');
    }

    public function edit($id)
    {
        $portofolio = DB::table('portofolios')->where('id',$id)->get();
        return view('/portofolio/edit',['portofolio' => $portofolio]);
    }

    public function update(Request $request, $id)
    {
        DB::table('portofolios')->where('id', $id, $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'panjang_lahan' => $request->panjang_lahan,
            'lebar_lahan' => $request->lebar_lahan,
            'luas_lahan' => $request->luas_lahan,
            'luas_bangunan' => $request->luas_bangunan,
            'jumlah_lantai' => $request->jumlah_lantai,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
        ]);
        return redirect('/dataportofolio');
    }

    public function softdel($id)
    {
        $portofolio = portofolio::find($id);
        $portofolio->delete();
        return redirect('/dataportofolio');
    }
}
