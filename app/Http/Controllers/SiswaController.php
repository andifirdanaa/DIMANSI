<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;
use App\User; 
use App\Guru; 

class SiswaController extends Controller
{
    public function index (request $request){

    	$data_siswa = \App\siswa::paginate(10);
    	return view('siswa.siswa',['data_siswa'=>$data_siswa]);
    }
    public function create(Request $request)
    {
      $this->validate($request,[
        'nama_depan'=>'required|min:1',
        'email'=> 'required|email|unique:users',
        'jenis_kelamin'=>'required',
        'nomer'=>'required|numeric|min:8',
        'alamat'=>'required',
        'tanggal_lahir'=>'required|min:10',

      ]);
    	$user = new\App\User;
      	$user->role = $request->role;
      	$user->name = $request->nama_depan;
      	$user->email = $request->email;
      	$user->password = bcrypt('rahasia');
      	$user->remember_token = str_random(60);
      	$user->save();

       


      $request->request->add(['user_id'=> $user->id ]);
    	$siswa = \App\siswa::create($request->all());
      $siswa->avatar = 'images/default.png';
    	return redirect('/siswa')-> with('sukses','Data Berhasil Diinput');
   	}
   	public function edit(Siswa $siswa){
   		
   		return view('siswa.edit',['siswa' => $siswa ]);
   	}
   	public function update(Request $request,Siswa $siswa)
    {
      
   		$siswa->update($request->all());
   		if ($request->hasFile('avatar')){
   			$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
   			$siswa->avatar =$request->file('avatar')->getClientOriginalName();
   			$siswa->save();
   		}
   		return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
   	}
   	public function delete(Siswa $siswa){
   		$siswa-> delete($siswa);
   		return redirect('/siswa')->with('sukses','Data Berhasil dihapus');
  	}
	public function profile(Siswa $siswa){
    $matapel = \App\mapel::all();

		return view('siswa.profile',['siswa' => $siswa, 'matapel'=>$matapel]);
	}
  public function addnilai(request $request,$idsiswa){
      $siswa = \App\siswa::find($idsiswa);
      if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
         return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada');
      }
      $siswa->mapel()->attach($request->mapel,['nilai'=>$request->nilai]);

      return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhasil di input');
  }
  public function editnilai(request $request,Siswa $siswa){
    $siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
  }
  public function deletenilai($idsiswa,$idmapel){
    $siswa = \App\siswa::find($idsiswa);
    $siswa->mapel()->detach($idmapel);
    return redirect()->back()->with('sukses','Data Berhasil Dihapus');
  }
  public function nilaisiswa(Siswa $siswa){
     $matapel = \App\mapel::all();
    return view('siswa.nilai',['siswa'=> $siswa, 'matapel'=>$matapel]);
  }
}
