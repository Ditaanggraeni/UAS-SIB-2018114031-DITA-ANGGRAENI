@extends('layouts.app')

@section('title', 'Tambah Data Absensi')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Absensi </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Waktu Absen</label>
                                <input type="time" class="form-control @error('waktu_absen') is-invalid @enderror" name="waktu_absen" value="{{ old('waktu_absen') }}">
                            
                                <!-- error message untuk waktu_absen -->
                                @error('waktu_absen')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

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
                                <label class="font-weight-bold">Matakuliah</label>
                                <select name="matakuliah_id" class="form-control">
                                @foreach($matkuls as $matkul)
                                <option value="{{$matkul->nama_matakuliah}}">{{$matkul->nama_matakuliah}}
                                </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <select name="keterangan" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="Hadir"> Hadir </option>
                                            <option value="Tidak Hadir"> Tidak Hadir </option>
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