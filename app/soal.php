<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    protected $table = 'soal';

    protected $guarded = array();

     public function kategori()
    {
        return $this->belongsTo('Kategori', 'kategori_id');
    }


    //autogenerated this function...
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
     //autogenerated this function...
    public function lembar()
    {
        return $this->belongsTo('lembar', 'lembar_id');
    }
      public function getMaxPoint()
    {
        $maxPoint = 0;
        foreach ($this->jawaban as $jawaban)
            if ($jawaban->poin > $maxPoint)
                $maxPoint = $jawaban->poin;

        return $maxPoint;
    }
}
