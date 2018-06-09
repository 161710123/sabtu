<?php

namespace App\Http\Controllers;

use App\berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = berita::all();
        return view('berita.index',compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('berita.create');
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
            'judul' => 'required|max:255',
            'isi' => 'required|max:255',
        ]);

        $berita = new berita;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->save();
        return redirect()->route('beritas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = berita::findOrFail($id);
        return view('berita.show',compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $berita = berita::findOrFail($id);
        return view('berita.edit',compact('berita'));
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
            'judul' => 'required|max:255',
            'isi' => 'required|max:255',
        ]);

        // update data berdasarkan id
        $berita = berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->save();
        return redirect()->route('beritas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $berita = berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('beritas.index');  
    }
}
