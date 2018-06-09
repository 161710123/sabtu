<?php

namespace App\Http\Controllers;

use App\industri;
use App\jurusan;
use Illuminate\Http\Request;

class IndustriController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 $industri = industri::with('jurusan')->get();
        return view('industri.index',compact('industri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $jurusan = jurusan::all();
        return view('industri.create',compact('jurusan'));
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
            'id_jurusan' => 'required'
        ]);

        $industri = new industri;
        $industri->nama = $request->nama;
        $industri->keterangan = $request->keterangan;
        $industri->id_jurusan = $request->id_jurusan;
        $industri->save();
        return redirect()->route('industris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $industri = industri::findOrFail($id);
        return view('industri.show',compact('industri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$industri = industri::findOrFail($id);
        $jurusan = jurusan::all();
        $selectedJurusan = industri::findOrFail($id)->dosen_id;
        return view('industri.edit',compact('industri','jurusan','selectedJurusan'));
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
            'id_jurusan' => 'required'
        ]);

        // update data berdasarkan id
        $industri = industri::findOrFail($id);
        $industri->nama = $request->nama;
        $industri->keterangan = $request->keterangan;
        $industri->id_jurusan = $request->id_jurusan;
        $industri->save();
        return redirect()->route('industris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $industri = industri::findOrFail($id);
        $industri->delete();
        return redirect()->route('industris.index');  
    }
}