<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Semester;
use App\Models\Kontrak_matakuliah;
use Illuminate\Http\Request;

class KontrakController extends Controller {
    
    public function index()
    {
        $kontrak = Kontrak_matakuliah::paginate(10);
        return view('kontraks.index', compact('kontrak'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all(['id', 'nama_mahasiswa']);
        $semesters = Semester::all(['id', 'semester']);
        return view('kontraks.create', compact('mahasiswas', 'semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mahasiswa_id'     => 'required',
            'semester_id'   => 'required'
        ]);
    
        $kontraks = Kontrak_matakuliah::create([
            'mahasiswa_id'     => $request->mahasiswa_id,
            'semester_id'     => $request->semester_id
        ]);
    
        if($kontraks){
            //redirect dengan pesan sukses
            return redirect()->route('kontrak.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('kotrak.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Kontrak_matakuliah $kontrak)
    {
        return view('kontraks.edit', compact('kontrak'));
    }

    public function update(Request $request, $id)
    {
        Kontrak_matakuliah::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        return redirect('/kontrak');
    }

    public function destroy($id)
    {
    $kontrak = Kontrak_matakuliah::find($id);

    $kontrak->delete();

    return response()->json([
        'message' => 'Data deleted successfully!'
    ]);
    }
}
