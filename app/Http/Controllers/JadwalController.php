<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Matkul;
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

        return view('jadwals.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwals.create');
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

        $jadwal = new Jadwal;

        $jadwal->jadwal = $request->jadwal;
        $jadwal->matakuliah_id = $request->matakuliah_id;

        $jadwal->save();

        return redirect('/jadwal');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwals = Jadwal::where('id', $id)->first();
        return view('jadwals.edit', ['jadwals' => $jadwals]);
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
        Jadwal::find($id)->update([
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id
        ]);

        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::find($id)->delete();
        return redirect('/jadwal');
    }

    public function addmatkul($id)
    {
        $matkul = Matkul::where('jadwal_id', '=', 0)->get();
        $jadwals = Jadwal::where('id', $id)->first();
        return view('jadwals.addmatkul', ['jadwals' => $jadwals, 'matkul' => $matkul]);
    }

    public function updateaddmatkul(Request $request, $id)
    {
        $matkuls = Matkul::where('id', $request->matkul_id)->first();
        Matkul::find($matkuls->id)->update([
            'jadwal_id' => $id
        ]);

        return redirect('/jadwal/addmatkul/' . $id);
    }

    public function deleteaddmatkul(Request $request, $id)
    {
        //dd($id);
        Matkul::find($id)->delete([
            'jadwal_id' => 0
        ]);

        return redirect('/jadwal');
    }
}

