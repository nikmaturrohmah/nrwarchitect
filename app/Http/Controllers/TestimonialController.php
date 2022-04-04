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
        File::move( storage_path('tmp/uploads/'.$request->post('image')), public_path('images/'.$request->post('image')) );

        $newData = [
            'name'      => $request->post('name'),
            'content'   => $request->post('content'),
            'image'     => $request->post('image'),
            'posted'    => true,
        ];

        Testimonial::create($newData);

        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    public function update($id, Request $request)
    {
        $old = Testimonial::find($id);
    
        $dataUpdate = [
            'name'         => $request->post('name'),
            'content'      => $request->post('content'),
            'posted'  => false,
        ];

        if ($request->post('image') !== null) {
            $imageOld = public_path('images/').$old->image;
            if(File::exists($imageOld)) {
                File::delete($imageOld);
            }
    
            File::move( storage_path('tmp/uploads/'.$request->post('image')), public_path('images/'.$request->post('image')) );
            $dataUpdate = array_merge($dataUpdate, ['image' => $request->post('image')]);
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
        $dataUpdate = [
            'posted'  => true,
        ];

        Testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil di draft']);

    }

    public function draft($id, Request $request)
    {
        $dataUpdate = [
            'posted'  => false,
        ];

        testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil di post']);
    }
}
