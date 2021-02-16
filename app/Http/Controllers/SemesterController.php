<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $semester = Semester::all();
        return view('semesters.index')->with(compact('semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'semester' => 'required',
        ]);
        $semester = new Semester();

        $semester->semester = $request->semester;
        $semester->save();
        return Response::json($semester);
    }

    public function update(Semester $semester, Request $request)
    {
        $request->validate([
            'semester' => 'required',
            ]);

        $semester->semester = $request->semester;
        $semester->save();
        return Response::json($semester);
    }
    
    public function destroy($id)
    {
      $semester = Semester::find($id);
  
      $semester->delete();
  
      return response()->json([
        'message' => 'Data deleted successfully!'
      ]);
    }

}
