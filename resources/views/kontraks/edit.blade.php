@extends('layouts.app')

@section('title', 'Edit Kontrak Matakuliah')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kontrak Matakuliah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('kontrak.update', $kontrak->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('mahasiswa_id') is-invalid @enderror" name="mahasiswa_id" value="{{ old('mahasiswa_id', $kontrak->mahasiswa_id) }}" placeholder="Masukkan Nama Mahasiswa">

                            <div class="form-group">
                                <label class="font-weight-bold">Semester</label>
                                <input type="text" class="form-control @error('semester_id') is-invalid @enderror" name="semester_id" value="{{ old('semester_id', $kontrak->semester_id) }}" placeholder="Masukkan SKS">
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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