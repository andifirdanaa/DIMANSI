<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujian extends Model
{
     protected $table = 'ujian';
     protected $fillable = ['kode_kuis','nama_kuis','link'];

      public function total(){
        return ujian::count();
    }
}
