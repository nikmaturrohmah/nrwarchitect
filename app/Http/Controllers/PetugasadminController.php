<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetugasAdmin;
use Illuminate\Support\Facades\Hash;
use App\Models\user;

class PetugasadminController extends Controller
{
    public function index()
    {
        $petugasadmin = PetugasAdmin::get();
        return view('admin.petugasadmin.index', ['petugasadmin' => $petugasadmin]);
    }

    public function create()
    {
        return view('admin.petugasadmin.create');
    }

    public function store(Request $request)
    {
        $newData = [
            'name'    => $request->post('name'),
            'email'   => $request->post('email'),
            'password'   => Hash::make($request->post('password')),
            
        ];

        PetugasAdmin::create($newData);
        

        return redirect()->route('admin.admin.index')->with(['success' => 'Data berhasil dibuat']);
    }

    public function edit($id)
    {
        $petugasadmin = PetugasAdmin::find($id);
        return view('admin.petugasadmin.edit',  ['petugasadmin'=> $petugasadmin]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name'                      => 'required',
            'email'                      => 'required',
        ]);

        if ($request->post('password') == null) {
            $dataUpdate = [
                'name' => $request->name,
                'email' => $request->email
            ];
        } else {
            $dataUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

        }

        PetugasAdmin::where('id', $id)->update($dataUpdate);
        $petugasadmin = PetugasAdmin::find($id);
        return redirect()->route('admin.admin.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function delete($id)
    {
        $petugasadmin = PetugasAdmin::find($id);
        $petugasadmin->delete();
        
        return redirect()->route('admin.admin.index')->with(['success' => 'Data berhasil dihapus']);
    }

}