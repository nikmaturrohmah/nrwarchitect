<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\petugasadmin;
use App\Models\user;

class PetugasadminController extends Controller
{
    public function petugasadmin(Request $request)
    {
        
        // mengambil data dari table petugasadmin
        if ($request->has('cari')){ $petugasadmin = PetugasAdmin::where('name','like','%'.$request->cari."%")->get ();}
        else{
        $petugasadmin = PetugasAdmin::all();
        }
 
        // mengirim data petugas ke view petugasadmin
        return view('/petugasadmin/datapetugasadmin',['petugasadmin' => $petugasadmin]);
    }

    public function tambahpetugasadmin()
    {
        return view('petugasadmin/tambahpetugasadmin');
    }

    public function simpan(Request $request)
    {
        DB::table('users')->insert([
            // 'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        //alihkan ke halaman petugasadmin
        return redirect('/datapetugasadmin');
    }

    public function edit($id)
    {
        $petugasadmin = DB::table('users')->where('id',$id)->get();
        return view('/petugasadmin/edit',['petugasadmin' => $petugasadmin]);
    }

    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id, $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect('/datapetugasadmin');
    }

    public function softdel($id)
    {
        $petugasadmin = PetugasAdmin::find($id);
        $petugasadmin->delete();
        return redirect('/datapetugasadmin');
    }
}
