<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Siswa;
use App\Guru;
use App\User;
use App\mapel;
use Hash;
use Validator;

class ProfileController extends Controller
{
    public function profilesiswa(Siswa $siswa){
    	 $matapel = \App\mapel::all();
    		return view ('siswa.myprofile',['siswa'=> $siswa, 'matapel'=> $matapel]);
    }
    public function editsiswa(Siswa $siswa){

    	return view ('layouts.edit',['siswa'=> $siswa]);
    }
    public function updatesiswa(Request $request, Siswa $siswa){
   
    	$siswa->update($request->all());
   		
   		if ($request->hasFile('avatar')){
   			$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
   			$siswa->avatar =$request->file('avatar')->getClientOriginalName();
   			$siswa->save();
   		}
   		return redirect('/profilesiswa')->with('sukses','Data Berhasil Diupdate');
    }
     public function profileguru(Guru $guru){
        return view ('guru.myprofile',['guru'=>$guru]);
    }
    public function editguru(Guru $guru){
      return view ('guru.editprofile',['guru'=> $guru]);
    }
     public function updateguru(Request $request, Guru $guru){

      $guru->update($request->all());
      
      
      if($request->hasFile('avatar')){
        $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        $guru->avatar =$request->file('avatar')->getClientOriginalName();
        $guru->save();
      }
       return redirect('/myprofile')->with('sukses','Data Berhasil Diupdate');
    }
}
