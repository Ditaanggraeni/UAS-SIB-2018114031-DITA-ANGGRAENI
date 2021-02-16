@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-12 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTodoModal">Tambah Matakuliah</button>
            </div>
            </div>
            <div class="row" style="clear: both;margin-top: 18px;">
                <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Mahasiswa</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $data)
                        <tr id="mahasiswa_{{$data->id}}">
                            <td>{{ $data->id  }}</td>
                            <td>{{ $data->nama_mahasiswa }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_tlp }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">
                                    <a data-id="{{ $data->id }}" onclick="editTodo(event.target)" class="btn btn-sm btn-info">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addTodoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Mahasiswa</h4>
        </div>
        <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="col-sm-12">Nama Mahasiswa</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="task" name="mahasiswa" placeholder="Enter Nama Mahasiswa">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-12">Alamat</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="sks" name="alamat" placeholder="Enter Alamat">
                        <span id="sksError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-12">Nomor Telepon</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tlp" name="notlp" placeholder="Enter Nomor Telepon">
                        <span id="tlpError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-12">Email</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                        <span id="emailError" class="alert-message"></span>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="addTodo()">Simpan</button>
        </div>
    </div>
  </div>
  
</div>
<div class="modal fade" id="editTodoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Mahasiswa</h4>
        </div>
        <div class="modal-body">

               <input type="hidden" name="todo_id" id="todo_id">
                <div class="form-group">
                    <label for="name" class="col-sm-12">Nama Mahasiswa</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="edittask" name="mahasiswaa" placeholder="Enter Nama Mahasiswa">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2">Alamat</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="editsks" name="alamat" placeholder="Enter Alamat">
                        <span id="sksError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-12">Nomor Telepon</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="edittlp" name="telp" placeholder="Enter Nomor Telepon">
                        <span id="telpError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-12">Email</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="editmail" name="mail" placeholder="Enter Email">
                        <span id="mailError" class="alert-message"></span>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="updateTodo()">Simpan</button>
        </div>
    </div>
  </div>

  <script>

function addTodo() {
    var task = $('#task').val();
    var sks = $('#sks').val();
    var tlp = $('#tlp').val();
    var email = $('#email').val();
    let _url     = `/mahasiswa`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "POST",
        data: {
            nama_mahasiswa: task,
            alamat: sks,
            no_tlp: tlp,
            email: email,
            _token: _token
        },
        success: function(data) {
                mahasiswa = data
                $('table tbody').append(`
                    <tr id="mahasiswa_${data.id}">
                        <td>${data.id}</td>
                        <td>${ data.nama_mahasiswa }</td>
                        <td>${ data.alamat }</td>
                        <td>${ data.no_tlp }</td>
                        <td>${ data.email }</td>
                        <td>
                            <a data-id="${ data.id }" onclick="editTodo(${data.id})" class="btn btn-info">Edit</a>
                            <a data-id="${data.id}" class="btn btn-danger" onclick="deleteTodo(${data.id})">Delete</a>
                        </td>
                    </tr>
                `);

                $('#task').val('');
                $('#sks').val('');
                $('#tlp').val('');
                $('#email').val('');

                $('#addTodoModal').modal('hide');
        },
        error: function(response) {
            $('#taskError').text(response.responseJSON.errors.nama_mahasiswa);
            $('#sksError').text(response.responseJSON.errors.alamat);
            $('#tlpError').text(response.responseJSON.errors.no_tlp);
            $('#emailError').text(response.responseJSON.errors.email);
        }
    });
}


function editTodo(e) {
    var id  = $(e).data("id");
    var nama_mahasiswa  = $("#mahasiswa_"+id+" td:nth-child(2)").html();
    var alamat  = $("#mahasiswa_"+id+" td:nth-child(3)").html();
    var no_tlp  = $("#mahasiswa_"+id+" td:nth-child(4)").html();
    var email  = $("#mahasiswa_"+id+" td:nth-child(5)").html();
    $("#todo_id").val(id);
    $("#edittask").val(nama_mahasiswa);
    $("#editsks").val(alamat);
    $("#edittlp").val(no_tlp);
    $("#editmail").val(email);
    $('#editTodoModal').modal('show');
}

function updateTodo() {
    var task = $('#edittask').val();
    var sks = $('#editsks').val();
    var tlp = $('#edittlp').val();
    var email = $('#editmail').val();
    var id = $('#todo_id').val();
    let _url     = `/mahasiswa/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "PUT",
        data: {
            nama_mahasiswa: task, 
            alamat: sks,
            no_tlp: tlp, 
            email: email,
            _token: _token
        },
        success: function(data) {
                mahasiswa = data
                $("#mahasiswa_"+id+" td:nth-child(2)").html(mahasiswa.nama_mahasiswa);
                $("#mahasiswa_"+id+" td:nth-child(3)").html(mahasiswa.alamat);
                $("#mahasiswa_"+id+" td:nth-child(4)").html(mahasiswa.no_tlp);
                $("#mahasiswa_"+id+" td:nth-child(5)").html(mahasiswa.email);
                $('#todo_id').val('');
                $('#edittask').val('');
                $('#editsks').val('');
                $('#edittlp').val('');
                $('#editmail').val('');
                $('#editTodoModal').modal('hide');
        },
        error: function(response) {
            $('#taskError').text(response.responseJSON.errors.nama_mahasiswa);
            $('#sksError').text(response.responseJSON.errors.alamat);
            $('#telpError').text(response.responseJSON.errors.no_tlp);
            $('#mailError').text(response.responseJSON.errors.email);
        }
    });
}

</script>
@endsection