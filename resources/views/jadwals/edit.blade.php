@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<form action="/jadwal/{{ $jadwals['id'] }}" method="POST">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Jadwal</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jadwal" aria-describedby="emailHelp" 
    value="{{ old('jadwal') ? old('jadwal') : $jadwals['jadwal'] }}">
      @error('Jadwal')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hari</label>
    <input type="text" class="form-control" name="matakuliah_id" id="exampleInputPassword1" 
    value="{{ old('matakuliah_id') ? old('matakuliah_id') : $jadwals['matakuliah_id'] }}">
    @error('matakuliah_id')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
@endsection