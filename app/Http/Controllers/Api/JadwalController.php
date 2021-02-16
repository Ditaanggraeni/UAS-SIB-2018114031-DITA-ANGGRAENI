<?php

namespace App\Http\Controllers\Api;

use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Jadwal',
            'data' => $jadwal
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
        $request->validate([
            'jadwal' => 'required|max:255',
            'matakuliah_id' => 'required',
        ]);

        $jadwals = Jadwal::create([
            'jadwal'=> $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id
            ]);

            if($jadwals)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Jadwal berhasil di tambahkan',
                    'data' => $jadwals
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Jadwal gagal di tambahkan',
                'data' => $jadwals
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
        $jadwals = Jadwal::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Jadwal',
            'data' => $jadwals
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
        $request->validate([
            'jadwal' => 'required|max:255',
            'matakuliah_id' => 'required',
        ]);

        $j = Jadwal::create([
            'jadwal'=> $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Jadwal Berhasil Di Update',
                'data' => $j
            ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $des = Jadwal::find($id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Jadwal Berhasil Dihapus',
            'data' => $des
        ], 200);
    }
}
