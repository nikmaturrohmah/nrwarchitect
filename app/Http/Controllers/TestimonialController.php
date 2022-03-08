<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\testimonial;

class TestimonialController extends Controller
{
    public function testimonial(Request $request)
    {
        
        // mengambil data dari table testimonial
        if ($request->has('cari')){ $testimonial = testimonial::where('name','like','%'.$request->cari."%")->get ();}
        else{
        $testimonial = testimonial::all();
        }
 
        // mengirim data petugas ke view testimonial
        return view('/testimonial/datatestimonial',['testimonial' => $testimonial]);
    }

    public function tambahtestimonial()
    {
        return view('testimonial/tambahtestimonial');
    }

    public function simpan(Request $request)
    {
        $file = $request->photo;
        $fileName = $request->name .'.' . $file->extension();
        $file->move(public_path('testimoni'), $fileName);

        $testimonial = new testimonial;
        $testimonial->name = $request->name;
        $testimonial->photo = $fileName;
        $testimonial->content = $request->content;
        $testimonial->posted = $request->posted;

        $testimonial->save();

        // return redirect('/admin/client')->with('Success', 'Data Added Successfully');
        // DB::table('testimonial')->insert([
        //     // 'id' => $request->id,
        //     'name' => $request->name,
        //     'photo' => $filename,
        //     'content' => $request->content,
        // ]);
        //alihkan ke halaman testimonial
        return redirect('/datatestimonial');
    }

    public function edit($id)
    {
        $testimonial = DB::table('testimonials')->where('id',$id)->get();
        return view('/testimonial/edit',['testimonial' => $testimonial]);
    }

    public function update(Request $request, $id)
    {
        DB::table('testimonials')->where('id', $id, $request->id)->update([
        $file = $request->photo,
        $fileName = $request->name .'.' . $file->extension(),
        $file->move(public_path('testimoni'), $fileName),

        $testimonial = new testimonial,
        $testimonial->name = $request->name,
        $testimonial->photo = $fileName,
        $testimonial->content = $request->content,
        $testimonial->posted = $request->posted,

        $testimonial->save(),
            // 'name' => $request->name,
            // 'photo' => $request->photo,
            // 'content' => $request->content,
            // 'posted' => $request->posted,
        ]);
    
        return redirect('/datatestimonial');
    }

    public function softdel($id)
    {
        $testimonial = testimonial::find($id);
        $testimonial->delete();
        return redirect('/datatestimonial');
    }
}
