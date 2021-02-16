@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('absen.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ABSENSI</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                              <th scope="col">ID</th>
                                <th scope="col">Waktu Absen</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Matakuliah</th>
                                <th scope="col">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($absen as $absens)
                                <tr>
                                    <td>{{ $absens->id }}</td>
                                    <td>{{ $absens->waktu_absen }}</td>
                                    <td>{{ $absens->mahasiswa_id }}</td>
                                    <td>{{ $absens->matakuliah_id }}</td>
                                    <td>{!! $absens->keterangan !!}</td>
                                    <td class="text-center"></td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Absen Belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $absen->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()-> has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()-> has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>

     
@endsection