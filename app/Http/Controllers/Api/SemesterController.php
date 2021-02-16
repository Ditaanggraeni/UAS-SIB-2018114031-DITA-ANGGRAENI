<?php

namespace App\Http\Controllers\Api;

use App\Models\Semester;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Semester',
            'data' => $semester
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
            'semester' => 'required',
        ]);
        $semester = Semester::create([
            'semester'   => $request->semester
        ]);

        if($semester)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Semester berhasil di tambahkan',
                    'data' => $semester
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Semester gagal di tambahkan',
                'data' => $semester
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
        $smt = Semester::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail data semester',
            'data' => $smt
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
            'semester' => 'required|max:255',
        ]);

        $smt = Semester::find($id)->update([
            'semester'     => $request->semester,
        ]);

        if($smt){
            return response()->json([ 
                'success' => true,
                'message' => 'Semester berhasil di update',
                'data' => $smt
            ], 200); //http status code sukses
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Semester gagal di update',
                'data' => $smt
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
         $del = Semester::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Semester berhasil dihapus',
            'data' => $del
        ], 200);
    }
}
