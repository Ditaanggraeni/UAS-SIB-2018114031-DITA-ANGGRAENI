<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaController extends Controller
{
  public function index()
  {
    $mahasiswa = Mahasiswa::all();
    return view('mahasiswas.index')->with(compact('mahasiswa'));
  }

  public function store(Request $request)
  {
      $request->validate([
          'nama_mahasiswa' => 'required|max:255',
          'alamat' => 'required',
          'no_tlp' => 'required',
          'email' => 'required',
      ]);
      $mahasiswa = new Mahasiswa();
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_tlp = $request->no_tlp;
        $mahasiswa->email = $request->email;
        $mahasiswa->save();
        return Response::json($mahasiswa);
  }

  public function update(Mahasiswa $mahasiswa, Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);

        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_tlp = $request->no_tlp;
        $mahasiswa->email = $request->email;
        $mahasiswa->save();
        return Response::json($mahasiswa);
    }

  public function destroy($id)
  {
    $mahasiswa = Mahasiswa::find($id);

    $mahasiswa->delete();

    return response()->json([
      'message' => 'Data deleted successfully!'
    ]);
}
}
