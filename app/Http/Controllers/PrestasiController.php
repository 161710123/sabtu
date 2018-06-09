<?php

namespace App\Http\Controllers;

use App\prestasi;
use App\eskul;
use App\jurusan;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = prestasi::with('eskul','jurusan')->get();
        return view('prestasi.index',compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $eskul = eskul::all();
         $jurusan = jurusan::all();
         return view('prestasi.create',compact('eskul','jurusan'));
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
            'id_eskul'=>'required',
            'id_jurusan'=>'required'
            ]);
      
        $prestasi = new prestasi;
        $prestasi->nama = $request->nama;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->id_eskul = $request->id_eskul;
        $prestasi->id_jurusan = $request->id_jurusan;
        $prestasi->save();
        return redirect()->route('prestasis.index');
    }

    /**id_eskulDisplay the sid_eskulified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = prestasi::findOrFail($id);
        return view('prestasi.show',compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $prestasi = prestasi::findOrFail($id);
          $eskul = eskul::all();
        $selectedEskul = prestasi::findOrFail($id)->id_eskul;
        $jurusan = jurusan::all();
        $selectedJurusan = prestasi::findOrFail($id)->id_jurusan;
        return view('prestasi.edit',compact('prestasi','eskul','selectedEskul','jurusan','selectedJurusan'));
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
            'id_eskul'=>'required',
            'id_jurusan'=>'required'
        ]);

        // update data berdasarkan id
        $prestasi = prestasi::findOrFail($id);
        $prestasi->nama = $request->nama;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->id_eskul = $request->id_eskul;
        $prestasi->id_jurusan = $request->id_jurusan;
        $prestasi->save();
        return redirect()->route('prestasis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $prestasi = prestasi::findOrFail($id);
        $prestasi->delete();
        return redirect()->route('prestasis.index');  
    }
}
