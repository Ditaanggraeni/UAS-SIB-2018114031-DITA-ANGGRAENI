<?php

namespace App\Http\Controllers\Api;

use App\Models\Kontrak_matakuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrak = Kontrak_matakuliah::paginate(10);
        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Kontrak Matakuliah',
            'data' => $kontrak
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
            'mahasiswa_id'     => 'required',
            'semester_id'   => 'required'
        ]);
    
        $kontraks = Kontrak_matakuliah::create([
            'mahasiswa_id'     => $request->mahasiswa_id,
            'semester_id'     => $request->semester_id
        ]);
    
        if($kontraks)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Kontrak Matakuliah berhasil di tambahkan',
                    'data' => $kontraks
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Kontrak Matakuliah gagal di tambahkan',
                'data' => $kontraks
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
        $kontraks = Kontrak_matakuliah::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail data kontrak matakuliah',
            'data' => $kontraks
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
        $this->validate($request, [
            'mahasiswa_id'     => 'required',
            'semester_id'   => 'required'
        ]);

        $km = Kontrak_matakuliah::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        if($km){
            return response()->json([ 
                'success' => true,
                'message' => 'Kontrak Matakuliah berhasil di update',
                'data' => $km
            ], 200); //http status code sukses
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Kontrak Matakuliah gagal di update',
                'data' => $km
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
        $del = Kontrak_matakuliah::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kontrak Matakuliah berhasil dihapus',
            'data' => $del
        ], 200);
    }
}
