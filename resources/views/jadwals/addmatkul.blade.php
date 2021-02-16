@extends('layouts.app')

@section('title', 'Jadwal')

@section('content')
<form action="/jadwal/addmatkul/{{$jadwals->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Jadwal</label>
      <select class="form-select" aria-label="Default select example" name="matkul_id">
      <option selected>Pilih Matakuliah</option>
      @foreach ($matkul as $m)
        <option value="{{$m->id}}">{{$m->nama_matakuliah}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Tambah Ke Jadwal</button>
</form>
    
@endsection