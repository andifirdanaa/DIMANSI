<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index (request $request){

    	$data_siswa = \App\siswa::all();
    	return view('siswa.siswa',['data_siswa'=>$data_siswa]);
    }
    public function create(Request $request)
    {
      $this->validate($request,[
        'nama_depan'=>'required|min:1',
        'email'=> 'required|email|unique:users',
        'jenis_kelamin'=>'required',
        'alamat'=>'required',

      ]);
    	$user = new\App\User;
      	$user->role ='siswa';
      	$user->name = $request->nama_depan;
      	$user->email = $request->email;
      	$user->password = bcrypt('rahasia');
      	$user->remember_token = str_random(60);
      	$user->save();

      	$request->request->add(['user_id'=> $user->id ]);
    	$siswa = \App\siswa::create($request->all());
    	return redirect('/siswa')-> with('sukses','Data Berhasil Diinput');
   	}
   	public function edit($id){
   		$siswa = \App\siswa::find($id);
   		return view('siswa.edit',['siswa' => $siswa ]);
   	}
   	public function update(Request $request,$id)
    {
      $this->validate($request,[
        'nama_depan'=>'required|min:1',
        'nama_belakang'=>'required',
        'email'=> 'required|email|unique:users',
        'jenis_kelamin'=>'required',
        'alamat'=>'required',
        'avatar'=>'mimes:jpeg,png',
      ]);
    	$siswa = \App\siswa::find($id);
   		$siswa->update($request->all());
   		$siswa = \App\siswa::find($id);
   		$siswa->update($request->all());
   		if ($request->hasFile('avatar')){
   			$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
   			$siswa->avatar =$request->file('avatar')->getClientOriginalName();
   			$siswa->save();
   		}
   		return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
   	}
   		public function delete($id,$user_id){
   		$siswa = \App\siswa::find($id);
   		$users = \App\user::find($user_id);
   		$siswa-> delete();
   		$users-> delete();
   		return redirect('/siswa')->with('sukses','Data Berhasil dihapus');
	}
	public function profile($id){
		$siswa = \App\siswa::find($id);
    $matapel = \App\mapel::all();

		return view('siswa.profile',['siswa' => $siswa, 'matapel'=>$matapel]);
	}
  public function myprofile(){
    return view ('siswa.myprofile');
  }
  public function addnilai(request $request,$idsiswa){
      $siswa = \App\siswa::find($idsiswa);
      if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
         return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada');
      }
      $siswa->mapel()->attach($request->mapel,['nilai'=>$request->nilai]);

      return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhasil di input');
  }
  public function editnilai(request $request,$id){
    $siswa = \App\siswa::find($id);
    $siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
  }
  public function deletenilai($idsiswa,$idmapel){
    $siswa = \App\siswa::find($idsiswa);
    $siswa->mapel()->detach($idmapel);
    return redirect()->back()->with('sukses','Data Berhasil Dihapus');
  }
}