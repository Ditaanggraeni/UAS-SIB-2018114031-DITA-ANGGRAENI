@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Tabel Mahasiswa</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Tambah Absen
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Waktu Absen</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nama Matakuliah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody id="absen-list" name="absen-list">
                @foreach ($absen as $data)
                <tr id="absen{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->waktu_absen}}</td>
                    <td>{{$data->mahasiswa_id}}</td>
                    <td>{{$data->matakuliah_id}}</td>
                    <td>{{$data->keterangan}}</td>
                    <td class="text-center"></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$absen->links()}};

        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Tambah Absen</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Simpan
                        </button>
                        <input type="hidden" id="absen_id" name="absen_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection