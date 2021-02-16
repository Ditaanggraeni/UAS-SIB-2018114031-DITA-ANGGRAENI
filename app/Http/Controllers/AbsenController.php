<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $absen = Absen::paginate(10);
        return view('absens.index', compact('absen'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all(['id', 'nama_mahasiswa']);
        $matkuls = Matkul::all(['id', 'nama_matakuliah']);
        return view('absens.create', compact('mahasiswas', 'matkuls'));
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
            'waktu_absen'     => 'required',
            'mahasiswa_id'   => 'required',
            'matakuliah_id'     => 'required',
            'keterangan'   => 'required'
        ]);
    
        $absens = Absen::create([
            'waktu_absen'     => $request->waktu_absen,
            'mahasiswa_id'     => $request->mahasiswa_id,
            'matakuliah_id'     => $request->matakuliah_id,
            'keterangan'   => $request->keterangan
        ]);
    
        if($absens){
            //redirect dengan pesan sukses
            return redirect()->route('absen.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('absen.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}