<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller {
 /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $matkul = Matkul::all();
        return view('matkuls.index')->with(compact('matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_matakuliah' => 'required|max:255',
            'sks' => 'required',
        ]);
        $matkul = new Matkul();
        $matkul->nama_matakuliah = $request->nama_matakuliah;
        $matkul->sks = $request->sks;
        $matkul->save();
        return Response::json($matkul);
    }

    public function update(Matkul $matkul, Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required',
            ]);

        $matkul->nama_matakuliah = $request->nama_matakuliah;
        $matkul->sks = $request->sks;
        $matkul->save();
        return Response::json($matkul);
    }
    
    public function destroy($id)
    {
      $matkul = Matkul::find($id);
  
      $matkul->delete();
  
      return response()->json([
        'message' => 'Data deleted successfully!'
      ]);
    }
}
