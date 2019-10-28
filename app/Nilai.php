<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public function mapel() {
        // 1 post hanya memiliki satu kategoti
        return $this->belongsTo('App\Mapel');
    }

    public function user() {
        // 1 post hanya memiliki satu kategoti
        return $this->belongsTo('App\User');
    }
    public function siswa(){
    	return$this->belongsTo('App\Siswa');
    }
}
