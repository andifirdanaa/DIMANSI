<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    public function mapel() {
        // 1 post hanya memiliki satu kategoti
        return $this->belongsTo('App\Mapel');
    }
}
