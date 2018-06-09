<?php

namespace App\Http\Controllers;

use App\fasilitas;
use App\jurusan;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$fasilitas = fasilitas::with('jurusan')->get();
        return view('fasilitas.index',compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = jurusan::all();
        return view('fasilitas.create',compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	  $this->validate($request,[
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'id_jurusan' =>'required'
        ]);

        $fasilitas = new fasilitas;
        $fasilitas->nama = $request->nama;
        $fasilitas->keterangan = $request->keterangan;
        $fasilitas->id_jurusan = $request->id_jurusan;
        $fasilitas->save();
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitas = fasilitas::findOrFail($id);
        return view('fasilitas.show',compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = fasilitas::findOrFail($id);
        $jurusan = jurusan::all();
        $selectedJurusan = fasilitas::findOrFail($id)->id_jurusan;
        return view('fasilitas.edit',compact('fasilitas','jurusan','selectedJurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
            "id_jurusan" => 'required'
        ]);

        // update data berdasarkan id
        $fasilitas = fasilitas::findOrFail($id);
        $fasilitas->nama = $request->nama;
        $fasilitas->keterangan = $request->keterangan;
        $fasilitas->id_jurusan = $request->id_jurusan;
        $fasilitas->save();
        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $fasilitas = fasilitas::findOrFail($id);
        $fasilitas->delete();
        return redirect()->route('fasilitas.index');  
    }
}
