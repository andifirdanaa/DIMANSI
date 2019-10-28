<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function kuis() {
        // 1 ke banyak
        return $this->hasMany('App\Kuis');
    }
}
