@extends('layouts.app')

@section('title', 'Jadwal')

@section('content')
<form action="/jadwal" method="POST">
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Jadwal</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jadwal" aria-describedby="emailHelp" value="{{ old('jadwal') }}">
    @error('jadwal')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hari</label>
    <input type="text" class="form-control" name="matakuliah_id" id="exampleInputPassword1" value="{{ old('matakuliah_id') }}">
    @error('matakuliah_id')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
@endsection