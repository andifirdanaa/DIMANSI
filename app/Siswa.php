<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','alamat','avatar','user_id','nomer','tanggal_lahir'];

    public function getAvatar()
        {
        	if(!$this->avatar){
        		return asset('img/default.png');
        	}
        	
        		return asset('images/'.$this->avatar);
        }
    public function mapel(){
    	return $this ->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
    public function nilai(){
        return $this->belongsToMany(Nilai::class);
    }
    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function nama_lengkap(){
        return $this->nama_depan.' '.$this->nama_belakang;
    }
    public function nilaii(){
        $total = 0;
        $hitung = 0;
    foreach ($this->Mapels as $mapel) {
    $total += $mapel->pivot->nilai;
    $hitung ++;
    }
     
    return round( $rata = ($hitung!=0)?($total/$hitung) * 1:0);
    }
    public function total(){
        return Siswa::count();
    }
    public function count(){
        return Mapels::count();
    }
}