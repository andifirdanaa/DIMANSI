<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ujian;
use App\User;
use App\Document;
use App\Siswa;
use App\Mapel;

class KuisController extends Controller
{
    public function index(){
        $no = 1;
    	$mapel = Mapel::all();
    	return view('siswa.kuis',compact('mapel','no'));
    }

    
}
