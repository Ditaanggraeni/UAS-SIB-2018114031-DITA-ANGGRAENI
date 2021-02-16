@extends('layouts.app')

@section('title', 'Jadwal')

@section('content')
<a href="/jadwal/create" class="card-link btn-primary">Tambah Jadwal</a>
@foreach ($jadwal as $jadwals)

<div class="card-deck">
<div class="card" style="width: 13.5rem;">
  <div class="card-body">
  <h5 class="card-text">{{ $jadwals['jadwal'] }}</h5>
    <h6 class="card-text">{{ $jadwals['matakuliah_id'] }}</h6>
      <hr>
        <a href="/jadwal/addmatkul/{{$jadwals['id']}}" class="card-link btn-primary">Tambah Matakuliah</a>
          <ul class="list-group">
          @foreach ($jadwals->matkul as $matkuls)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{$matkuls->nama_matakuliah}}
              <form action="/jadwal/deleteaddmatkul/{{ $matkuls->id }}" method="POST">
              @csrf 
              @method('PUT')
              <button type="submit" class="badge card-link btn-danger">X</button>
            </form>
            </li>

          @endforeach
         </ul>

      <hr>
    <a href="/jadwal/{{$jadwals['id']}}/edit" class="card-link btn-warning">Edit</a>
    <form action="/jadwal/{{$jadwals['id']}}" method="POST">
      @csrf 
      @method('DELETE')
      <button class="card-link btn-danger">Delete</button>
    </form>
  </div>
</div>
@endforeach
<div>
    </div>
@endsection