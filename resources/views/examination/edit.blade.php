@extends('layouts.app')


@section('content')
    <div class="main">
        <div class="main-content">
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif

            <div class="row">
                <div class = "col-md-12">
                    <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">Tambah kan Data Latihan</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                        <form action="{{route('examination.update', $latihan->id)}}" method="post">
                            <div class="text-center">
                                <h4>Buat Soal</h4>
                            </div>

                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{session('info')}}
                                </div>
                            @endif


                            {{csrf_field()}}
                            {{method_field('put')}}

                            <div class="form-group">
                                <label for="soal">Pertanyaan : </label>
                                <textarea name="soal" id="editor" class="form-control" placeholder="Input Soal .." >{{ $latihan->soal }}</textarea>
                                @if($errors->has('soal'))
                                    <strong class="text-danger"> {{$errors->first('soal')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="a">JAWABAN A : </label>
                                <input type="text" name="a" class="form-control" placeholder="Input Jawaban A " value="{{ $latihan->a }}">
                                @if($errors->has('a'))
                                    <strong class="text-danger"> {{$errors->first('a')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="b">JAWABAN B : </label>
                                <input type="text" name="b" class="form-control" placeholder="Input Jawaban B " value="{{ $latihan->b }}">
                                @if($errors->has('b'))
                                    <strong class="text-danger"> {{$errors->first('b')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="c">JAWABAN C : </label>
                                <input type="text" name="c" class="form-control" placeholder="Input Jawaban C " value="{{ $latihan->c }}">
                                @if($errors->has('c'))
                                    <strong class="text-danger"> {{$errors->first('c')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="d">JAWABAN D : </label>
                                <input type="text" name="d" class="form-control" placeholder="Input Jawaban D " value="{{ $latihan->a }}">
                                @if($errors->has('d'))
                                    <strong class="text-danger"> {{$errors->first('d')}} </strong>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="knc_jawaban">KUNCI JAWABAN : </label>
                                <select name="knc_jawaban" id="" class="form-control">
                                    <option value="" class="disable selected">Pilih Kunci Jawaban</option>                                    
                                    <option value="a" 
                                    <?php if($latihan->knc_jawaban == 'a') {
                                        echo "selected";
                                    }?>
                                    >A</option>
                                    <option value="b" 
                                        <?php if($latihan->knc_jawaban == 'b') {
                                            echo "selected";
                                        }?>
                                    >B</option>
                                    <option value="c"
                                        <?php if($latihan->knc_jawaban == 'c') {
                                            echo "selected";
                                        }?>
                                    >C</option>
                                    <option value="d"
                                        <?php if($latihan->knc_jawaban == 'd') {
                                            echo "selected";
                                        }?>
                                    >D</option>
                                </select>
                                @if($errors->has('knc_jawaban'))
                                    <strong class="text-danger"> {{$errors->first('knc_jawaban')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori Kuis : </label>
                                <select name="kategori" id="" class="form-control">
                                    <option value="" class="disable selected">---Pilih Kategori Kuis---</option>                                    
                                    @foreach ($mapel as $item)
                                        <option value="{{$item->id}}"
                                            <?php if($latihan->mapel_id == $item->id) {
                                                echo "selected";
                                            }?>       
                                        >{{$item->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('kategori'))
                                    <strong class="text-danger"> {{$errors->first('kategori')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="aktif">STATUS SOAL : </label>
                                <select name="aktif" id="" class="form-control">
                                    <option value="" class="disable selected">Pilih Status Soal</option>                                    
                                    <option value="Y"
                                        <?php if($latihan->aktif == 'Y') {
                                            echo "selected";
                                        }?>
                                    >AKTIF</option>
                                    <option value="N"
                                        <?php if($latihan->aktif == 'N') {
                                            echo "selected";
                                        }?>
                                    >NON AKTIF</option>
                                </select>
                                @if($errors->has('aktif'))
                                    <strong class="text-danger"> {{$errors->first('aktif')}} </strong>
                                @endif
                            </div>

                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'editor', options );
    </script>
@endsection