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
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matkul as $data)
                        <tr id="matkul_{{$data->id}}">
                            <td>{{ $data->id  }}</td>
                            <td>{{ $data->nama_matakuliah }}</td>
                            <td>{{ $data->sks }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('matkul.destroy', $data->id) }}" method="POST">
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
            <h4 class="modal-title">Tambah MataKuliah</h4>
        </div>
        <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="col-sm-12">Nama Matakuliah</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="task" name="todo" placeholder="Enter Nama Matakuliah">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2">SKS</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="sks" name="sks" placeholder="Enter SKS">
                        <span id="sksError" class="alert-message"></span>
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
            <h4 class="modal-title">Edit Matakuliah</h4>
        </div>
        <div class="modal-body">

               <input type="hidden" name="todo_id" id="todo_id">
                <div class="form-group">
                    <label for="name" class="col-sm-12">Nama Matakuliah</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="edittask" name="matkul" placeholder="Enter Nama Matakuliah">
                        <span id="taskError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2">SKS</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="editsks" name="sks" placeholder="Enter SKS">
                        <span id="sksError" class="alert-message"></span>
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
    let _url     = `/matkul`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "POST",
        data: {
            nama_matakuliah: task,
            sks: sks,
            _token: _token
        },
        success: function(data) {
                matkul = data
                $('table tbody').append(`
                    <tr id="matkul_${data.id}">
                        <td>${data.id}</td>
                        <td>${ data.nama_matakuliah }</td>
                        <td>${ data.sks }</td>
                        <td>
                            <a data-id="${ data.id }" onclick="editTodo(${data.id})" class="btn btn-info">Edit</a>
                            <a data-id="${data.id}" class="btn btn-danger" onclick="deleteTodo(${data.id})">Delete</a>
                        </td>
                    </tr>
                `);

                $('#task').val('');
                $('#sks').val('');

                $('#addTodoModal').modal('hide');
        },
        error: function(response) {
            $('#taskError').text(response.responseJSON.errors.nama_matakuliah);
            $('#sksError').text(response.responseJSON.errors.sks);
        }
    });
}

function deleteTodo(id) {
    let url = `/matkul/${id}`;
    let token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url,
        type: 'DELETE',
        data: {
        _token: token
        },
        success: function(response) {
            $("#matkul_"+id).remove();
        }
    });
}

function editTodo(e) {
    var id  = $(e).data("id");
    var nama_matakuliah  = $("#matkul_"+id+" td:nth-child(2)").html();
    var sks  = $("#matkul_"+id+" td:nth-child(3)").html();
    $("#todo_id").val(id);
    $("#edittask").val(nama_matakuliah);
    $("#editsks").val(sks);
    $('#editTodoModal').modal('show');
}

function updateTodo() {
    var task = $('#edittask').val();
    var sks = $('#editsks').val();
    var id = $('#todo_id').val();
    let _url     = `/matkul/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "PUT",
        data: {
            nama_matakuliah: task, 
            sks: sks,
            _token: _token
        },
        success: function(data) {
                matkul = data
                $("#matkul_"+id+" td:nth-child(2)").html(matkul.nama_matakuliah);
                $("#matkul_"+id+" td:nth-child(3)").html(matkul.sks);
                $('#todo_id').val('');
                $('#edittask').val('');
                $('#editsks').val('');
                $('#editTodoModal').modal('hide');
        },
        error: function(response) {
            $('#taskError').text(response.responseJSON.errors.nama_matakuliah);
            $('#sksError').text(response.responseJSON.errors.sks);
        }
    });
}

</script>
@endsection