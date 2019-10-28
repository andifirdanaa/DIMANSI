<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Kuis;
use App\Nilai;
use App\Mapel;
use DB;
use File;

class ExaminationContoller extends Controller
{
    /**
     * Display a listing of the resource.
     * //by makajikenduri
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $latihans = Kuis::all();
        return view ('examination.index' , compact('latihans','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('examination.create',compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
        'soal'=>'required',
        'kategori'=>'required',
        'a'=> 'required',
        'b'=>'required',
        'c'=>'required',
        'knc_jawaban'=>'required',
        'aktif'=>'required',

      ]);
        $kuis = new Kuis;
        $kuis->soal = $request->soal;
        $kuis->mapel_id = $request->kategori;
        $kuis->status = 0;
        $kuis->a = $request->a;
        $kuis->b = $request->b;
        $kuis->c = $request->c;
        $kuis->knc_jawaban = $request->knc_jawaban;
        $kuis->aktif = $request->aktif ;
        $kuis->save();
        return redirect()->route('examination.index')->withInfo('Soal Baru Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::all();
        $latihan = Kuis::find($id);
        if ($latihan->status == 0){
            return view ('examination.edit' , compact('latihan','mapel'));
        }else{
            return view ('examination.edit2' , compact('latihan','mapel'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'soal'=>'required',
        'kategori'=>'required',
        'a'=> 'required',
        'b'=>'required',
        'c'=>'required',
        'knc_jawaban'=>'required',
        'aktif'=>'required',

      ]);
        $latihan = Kuis::find($id);
        $latihan->soal = $request->soal;
        $latihan->mapel_id = $request->kategori;
        $latihan->a = $request->a;
        $latihan->b = $request->b;
        $latihan->c = $request->c;
        $latihan->knc_jawaban = $request->knc_jawaban;
        $latihan->aktif = $request->aktif ;
        $latihan->save();

        return redirect()->route('examination.index')->withInfo('Soal Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $latihan = Kuis::find($id);
        if($latihan->status == 1){
            File::delete('KuisImage/'.$latihan->a);
            File::delete('KuisImage/'.$latihan->b);
            File::delete('KuisImage/'.$latihan->c);
        }
        $latihan->delete();

        return back()->withInfo('Post Berhasil Di Hapus');
    }

    public function soal($id){
        //cek user udh pernah ikut kuis blm ?
        $nilai = Nilai::where('user_id',Auth::user()->id)
                ->where('mapel_id', '=', $id)
                ->get();
        
        $cek = $nilai->count();
        if($cek == 0){
            //cek admin udh bikin soal buat mapel itu blm?
            $soal = Kuis::where('aktif','Y')
                    ->where('mapel_id', '=', $id)
                    ->inRandomOrder()->get();
            $jumlah = $soal->count();

            //id mapel
            $mapel_id = $id;
            
            // cek kalo mapel kuis ada soal nya apa tdk?
            if($jumlah == 0){
                return 'belum dikin kuis nya gada soal';
            }else{
                $no = 1;
                return view ('examination.soal', compact('soal','jumlah','no','mapel_id'));
            }
        }else{
            //return ke halaman nilai kalo dia udh pernah ambil kuis nya
            $soal = Kuis::where('aktif','Y')
                ->where('mapel_id', '=', $id)
                ->get();
            $jumlah = $soal->count();
            return view ('examination.nilai',compact('nilai','jumlah'));
        }
    }

    public function jawab(Request $request, $id){
        $pilihan = $request->pilihan;
        $id_soal = $request->id;
        $jumlah = $request->jumlah;
        $mapel_id = $request->mapel_id;
        // dd($mapel_id);

        $score  = 0;
        $benar  = 0;
        $salah  = 0;
        $kosong = 0;

        for ($i=0;$i<$jumlah;$i++){
            $nomor=$id_soal[$i];
            if (empty($pilihan[$nomor])){
                $kosong++;
                // echo "jawaban kosong ".$kosong;
            }else{
                $jawaban=$pilihan[$nomor];
                $cek = DB::table('kuis')
                    ->where('id', '=', $nomor)
                    ->where('knc_jawaban', '=', $jawaban)
                    ->count();
                
                if($cek){
                    //jawaban benar
                    $benar++;
                    // echo "jawaban benar ". $benar;
                }else{
                    $salah++;
                    // echo "jawaban salah ". $salah;
                }
            }

            $jumlah_soal = DB::table('kuis')
                    ->where('mapel_id', '=', $id)
                    ->where('aktif', '=', 'Y')
                    ->count();
                    // dd($jumlah_soal);
            $score = 100/$jumlah_soal*$benar;
            $hasil = number_format($score , 1);

        }

        $nilai = new Nilai;
        $nilai->user_id = Auth::user()->id;
        $nilai->mapel_id = $id;
        $nilai->benar = $benar;
        $nilai->salah = $salah;
        $nilai->kosong = $kosong;
        $nilai->score = $hasil;
        $nilai->save();
        
        return back();
    }

    public function KuisImage (Request $request){
        $kuis = new Kuis;
        $kuis->soal = $request->soal;
        $kuis->mapel_id = $request->kategori;
        $kuis->status = 1;

        $a = $request->file('a');
        $fileNameA = time().'A.'.$a->getClientOriginalExtension();
        $destinationPath = public_path('KuisImage');
        $a->move($destinationPath , $fileNameA);
        $kuis->a = $fileNameA;

        $b = $request->file('b');
        $fileNameB = time().'B.'.$b->getClientOriginalExtension();
        $destinationPath = public_path('KuisImage');
        $b->move($destinationPath , $fileNameB);
        $kuis->b = $fileNameB;

        
        $c = $request->file('c');
        $fileNameC = time().'C.'.$c->getClientOriginalExtension();
        $destinationPath = public_path('KuisImage');
        $c->move($destinationPath , $fileNameC);
        $kuis->c = $fileNameC;

        $kuis->knc_jawaban = $request->knc_jawaban;
        $kuis->aktif = $request->aktif ;
        $kuis->save();

        return redirect()->route('examination.index')->withInfo('Soal Berhasil Di Update');
        
    }

    public function KuisEditImage (Request $request , $id){
        // dd($request);
        $latihan = Kuis::find($id);
        
        $latihan->soal = $request->soal;
        $latihan->mapel_id = $request->kategori;
        if($request->hasFile('a')){
            File::delete('KuisImage/'.$latihan->a);
            $a = $request->file('a');
            $fileNameA = time().'A.'.$a->getClientOriginalExtension();
            $destinationPath = public_path('KuisImage');
            $a->move($destinationPath , $fileNameA);
            $latihan->a = $fileNameA;
        }
        
        if($request->hasFile('b')){
            File::delete('KuisImage/'.$latihan->b);
            $b = $request->file('b');
            $fileNameB = time().'B.'.$b->getClientOriginalExtension();
            $destinationPath = public_path('KuisImage');
            $b->move($destinationPath , $fileNameB);
            $latihan->b = $fileNameB;
        }
        
        if($request->hasFile('c')){
            File::delete('KuisImage/'.$latihan->c);
            $c = $request->file('c');
            $fileNameC = time().'C.'.$c->getClientOriginalExtension();
            $destinationPath = public_path('KuisImage');
            $c->move($destinationPath , $fileNameC);
            $latihan->c = $fileNameC;
        }
        
        $latihan->knc_jawaban = $request->knc_jawaban;
        $latihan->aktif = $request->aktif ;
        $latihan->save();

        return redirect()->route('examination.index')->withInfo('Soal Berhasil Di Update');
    }
        
}
