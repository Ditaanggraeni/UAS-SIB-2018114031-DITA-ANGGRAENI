<?php

namespace App\Http\Controllers\Api;

use App\Models\Absen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::paginate(10);

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Absensi',
            'data' => $absen
        ], 200); //http status code sukses
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
            'mahasiswa_id'   => 'required',
            'matakuliah_id'     => 'required',
            'keterangan'   => 'required'
        ]);
    
        $absens = Absen::create([
            'mahasiswa_id'     => $request->mahasiswa_id,
            'matakuliah_id'     => $request->matakuliah_id,
            'keterangan'   => $request->keterangan
        ]);

        if($absens)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Absen berhasil di tambahkan',
                    'data' => $absens
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Absen gagal di tambahkan',
                'data' => $absens
            ], 409);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absens = Absen::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail data absen',
            'data' => $absens
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
