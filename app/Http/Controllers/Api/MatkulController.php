<?php

namespace App\Http\Controllers\Api;

use App\Models\Matkul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = Matkul::all();

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Matakuliah',
            'data' => $matkul
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
            'nama_matakuliah' => 'required|max:255',
            'sks' => 'required',
        ]);

        $matkul = Matkul::create([
            'nama_matakuliah'     => $request->nama_matakuliah,
            'sks'     => $request->sks,
        ]);

        if($matkul)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Matakuliah berhasil di tambahkan',
                    'data' => $matkul
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Matakuliah gagal di tambahkan',
                'data' => $matkul
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
        $matkuls = Matkul::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail data matakuliah',
            'data' => $matkuls
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
            'nama_matakuliah' => 'required|max:255',
            'sks' => 'required',
        ]);

        $mk = Matkul::find($id)->update([
            'nama_matakuliah'     => $request->nama_matakuliah,
            'sks'     => $request->sks,
        ]);

        if($mk){
            return response()->json([ 
                'success' => true,
                'message' => 'Matakuliah berhasil di update',
                'data' => $mk
            ], 200); //http status code sukses
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Matakuliah gagal di update',
                'data' => $mk
            ], 409); //http status code conflict
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Matkul::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Matakuliah berhasil dihapus',
            'data' => $del
        ], 200);
    }
}
