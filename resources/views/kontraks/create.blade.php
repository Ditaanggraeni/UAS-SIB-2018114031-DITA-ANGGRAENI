@extends('layouts.app')

@section('title', 'Tambah Kotrak Matakuliah')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Kontrak Matakuliah </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('kontrak.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label for="nama_mahasiswa" class="font-weight-bold">Nama Mahasiswa</label>
                                <select name="mahasiswa_id" class="form-control"> 
                                @foreach($mahasiswas as $mahasiswa)
                                <option value="{{$mahasiswa->nama_mahasiswa}}">{{$mahasiswa->nama_mahasiswa}}
                                </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Semester</label>
                                <select name="semester_id" class="form-control">
                                @foreach($semesters as $semester)
                                <option value="{{$semester->semester}}">{{$semester->semester}}
                                </option>
                                @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
     
@endsection