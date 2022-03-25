<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Testimonial;
use Webp;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::get();
        return view('admin.testimonial.index', ['testimonial' => $testimonial]);
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $imageName = "testimonial-".rand(1000, 9999).time().'.'.$request->file->extension();

        $webp = Webp::make($request->file);

        if ($webp->save(public_path('images/'.$imageName))) {
            $newData = [
                'name'         => $request->post('name'),
                'content'   => $request->post('content'),
                'photo'   => $imageName,
                'posted'  => 'drafted',
            ];
    
            Testimonial::create($newData);    
        }

        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    public function update($id, Request $request)
    {
        $dataUpdate = [
            'name'         => $request->post('name'),
            'content'      => $request->post('content')
        ];

        $old = Testimonial::find($id);

        if ($request->hasFile('file')) {

            $imagePath = public_path('images/').$old->image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $imageName = "testimonial-".rand(1000, 9999).time().'.'.$request->file->extension();
            $webp = Webp::make($request->file);

            if ($webp->save(public_path('images/'.$imageName))) {
                $dataUpdate = array_merge($dataUpdate, ['photo' => $imageName]);
            }
        }

        Testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($id)
    {
        $image = Testimonial::find($id);
        $image->delete();
        
        $imagePath = public_path('images/').$image->image;
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }

        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function publish($id, Request $request)
    {
        /* $testimonial = Testimonial::where('posted', 'published')->get();

        if (sizeof($testimonial) >= 3) {
            return redirect()->route('admin.testimonial.index')->with(['error' => 'Jumlah testimonial untuk di publish sudah maksimal']);
        } */

        $dataUpdate = [
            'posted'  => 'published',
        ];

        Testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil di post']);

    }

    public function draft($id, Request $request)
    {
        /* $testimonial = Testimonial::where('posted', 'drafted')->get();

        if (sizeof($testimonial) <= 3) {
            return redirect()->route('admin.testimonial.index', $id)->with(['error' => 'Jumlah testimonial untuk di ditampilkan kurang']);
        } */

        $dataUpdate = [
            'posted'  => 'drafted',
        ];

        testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil di post']);
    }
}
