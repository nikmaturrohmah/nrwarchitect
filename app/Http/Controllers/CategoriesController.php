<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\categories;

class CategoriesController extends Controller
{
    public function categories(Request $request)
    {
        
        // mengambil data dari table categories
        if ($request->has('cari')){ $categories = categories::where('name','like','%'.$request->cari."%")->get ();}
        else{
        $categories = categories::all();
        }
 
        // mengirim data petugas ke view categories
        return view('/categories/datacategories',['categories' => $categories]);
    }

    public function tambahcategories()
    {
        return view('categories/tambahcategories');
    }

    public function simpan(Request $request)
    {
        DB::table('categories')->insert([
            // 'id' => $request->id,
            'name' => $request->name,
        ]);
        //alihkan ke halaman categories
        return redirect('/datacategories');
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->where('id',$id)->get();
        return view('/categories/edit',['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        DB::table('categories')->where('id', $id, $request->id)->update([
            'name' => $request->name,
        ]);
        return redirect('/datacategories');
    }

    public function softdel($id)
    {
        $categories = categories::find($id);
        $categories->delete();
        return redirect('/datacategories');
    }
}
