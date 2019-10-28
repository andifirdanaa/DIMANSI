<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mapel;
use App\Kuis;
use App\Nilai;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $mapel = Mapel::all();
        return view ('mapels.index',compact('no','mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new Mapel;
        $mapel->nama = $request->nama;
        $mapel->save();
        return redirect()->route('mapel.index')->withInfo('Mapel Baru Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $mapel = Mapel::find($id);
        $mapel->nama = $request->nama;
        $mapel->save();

        return redirect()->route('mapel.index')->withInfo('Mapel Berhasil Di Edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuis = Kuis::where('mapel_id', '=', $id);
        $kuis->delete();
        $nilai = Nilai::where('mapel_id', '=', $id);
        $nilai->delete();
        $mapel = Mapel::find($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->withInfo('Mapel Berhasil Di Hapus');
    }
}
