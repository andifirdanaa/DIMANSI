<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function siswa(){
        return $this->hasOne(Siswa::class);
                                        // yg mau diambil , yg mau make
    }
    public function guru(){
        return $this->hasOne(Guru::class);
                                        // yg mau diambil , yg mau make
      }
    public function mapel(){
        return $this ->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
    public function lembar()
    {
        return $this->belongsToMany(Lembar::class);
    }
     public function nilai(){
        return $this->belongsToMany(Nilai::class);
    }
}
