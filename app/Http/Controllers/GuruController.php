<?php

namespace App\Http\Controllers;

use App\guru;
use File;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = guru::all();
        return view('guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('guru.create');
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
    	  	'foto' => 'required|',
            'nama' => 'required|max:255',
            'mapel' => 'required|max:255'
        ]);

        $guru = new guru;
        $guru->foto = $request->foto;
        $guru->nama = $request->nama;
        $guru->mapel = $request->mapel;
        //upload foto
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $uploadSucces= $file->move($destinationPath,$filename);
            $guru->foto= $filename;
        }
        $guru->save();
        return redirect()->route('gurus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = guru::findOrFail($id);
        return view('guru.show',compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $guru = guru::findOrFail($id);
	    return view('guru.edit',compact('guru'));
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
        	'foto' => 'required|',
            'nama' => 'required|max:255',
            'mapel' => 'required|max:255',
        ]);

        // update data berdasarkan id
        $guru = guru::findOrFail($id);
        $guru->foto = $request->foto;
        $guru->nama = $request->nama;
        $guru->mapel = $request->mapel;
        
       	$guru->save();
        return redirect()->route('gurus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $guru = guru::findOrFail($id);
        	$guru->delete();
		return redirect()->route('gurus.index');  
    }
}
