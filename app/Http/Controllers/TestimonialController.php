<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Testimonial;

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
        $request->validate([
            'name'  => 'required',
            'content'   => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $newData = [
            'name'      => $request->name,
            'content'   => $request->content,
            'posted'    => 'published',
        ];

        if ($request->hasFile('photo')) {
            $imageName = "testimonial-".time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);

            $newData = array_merge($newData, ['photo' => $imageName]);
        }

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
        $request->validate([
            'name'  => 'required',
            'content'   => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dataUpdate = [
            'name'      => $request->name,
            'content'   => $request->content,
        ];

        $old = Testimonial::find($id);

        if ($request->hasFile('photo')) {

            $imagePath = public_path('images/').$old->photo;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $imageName = "testimonial-".time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);

            $dataUpdate = array_merge($dataUpdate, ['photo' => $imageName]);
        }

        Testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function publish($id, Request $request)
    {
        $dataUpdate = [
            'posted'      => "published",
        ];

        Testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil dipublish']);
    }

    public function draft($id, Request $request)
    {
        $dataUpdate = [
            'posted'      => "drafted",
        ];

        Testimonial::where('id', $id)->update($dataUpdate);
        return redirect()->route('admin.testimonial.index')->with(['success' => 'Data berhasil didraft']);
    }
}
