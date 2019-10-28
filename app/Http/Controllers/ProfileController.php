<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Siswa;
use App\Guru;
use App\User;
use App\mapel;
use DB;
use App\Nilai;
use Hash;
use Validator;

class ProfileController extends Controller
{
    public function profilesiswa(Siswa $siswa){
         $nilai = Nilai::where('user_id',Auth::user()->id)
                ->get();
    		return view ('siswa.myprofile', compact('siswa','nilai'));
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
    public function totalsiswa(){
      return Siswa::count();
    }
     public function profileguru(Guru $guru){
        $user = \App\User::all();
        $siswa = \App\siswa::all();
        $nilai =  \App\Nilai::all();

        return view ('guru.myprofile',['guru'=>$guru, 'siswa'=>$siswa, 'user'=> $user, 'nilai'=>$nilai]);
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
