<?php

namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Mahasiswa',
            'data' => $mahasiswa
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
            'nama_mahasiswa' => 'required|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama_mahasiswa'     => $request->nama_mahasiswa,
            'alamat'     => $request->alamat,
            'no_tlp'     => $request->no_tlp,
            'email'   => $request->email
        ]);

        if($mahasiswa)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Mahasiswa berhasil di tambahkan',
                    'data' => $mahasiswa
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Mahasiswa gagal di tambahkan',
                'data' => $mahasiswa
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
        $mahasiswas = Mahasiswa::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail data mahasiswa',
            'data' => $mahasiswas
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
            'nama_mahasiswa' => 'required|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);
        $m = Mahasiswa::find($id)->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email
        ]);

        if($m){
            return response()->json([ 
                'success' => true,
                'message' => 'Mahasiswa berhasil di update',
                'data' => $m
            ], 200); //http status code sukses
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa gagal di update',
                'data' => $m
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
        $del = Mahasiswa::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $del
        ], 200);
    }
}
