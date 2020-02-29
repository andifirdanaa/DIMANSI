<?php

namespace App\Http\Controllers;

use App\Document;
use App\Konten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $documents = Document::all();
        // dd($document);
        return view ('documents.index',compact('documents','no'));
    }

    public function showFile($id){
        $dw = Document::find($id);
        
        // return response()->file('./pdf/'.$dw->path_document);
        return response()->download('./pdf/'.$dw->path_document);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title'             => 'required|min:5',
            'upload_document'   => 'required|file|mimes:pdf|max:2048'
        ]);

        $document = new Document;
        $document->name_document = $request->title;

        if($request->hasFile('upload_document')){
            $file = $request->file('upload_document');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('pdf');
            $file->move($destinationPath , $fileName);
            $document->path_document = $fileName;
        }
        $document->save();
        return redirect()->route('document.index')->withInfo('Data Baru Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konten = Document::find($id);
        File::delete('pdf/'.$konten->path_document);
        $konten->delete();
        
        
        return back()->withInfo('Post Berhasil Di Hapus');
    }
}
