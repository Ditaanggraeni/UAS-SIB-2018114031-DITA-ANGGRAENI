@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-12 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTodoModal">Tambah Semester</button>
            </div>
            </div>
            <div class="row" style="clear: both;margin-top: 18px;">
                <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semester as $data)
                        <tr id="semester_{{$data->id}}">
                            <td>{{ $data->id  }}</td>
                            <td>{{ $data->semester }}</td>
                            <td>
                                <a data-id="{{ $data->id }}" onclick="editTodo(event.target)" class="btn btn-info">Edit</a>
                                <a class="btn btn-danger" onclick="deleteTodo({{ $data->id }})">Delete</a>
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
            <h4 class="modal-title">Tambah Semester</h4>
        </div>
        <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="col-sm-12">Semester</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="task" name="todo" placeholder="Enter Semester">
                        <span id="taskError" class="alert-message"></span>
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
            <h4 class="modal-title">Edit Semester</h4>
        </div>
        <div class="modal-body">

               <input type="hidden" name="todo_id" id="todo_id">
                <div class="form-group">
                    <label for="name" class="col-sm-12">Semester</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="edittask" name="matkul" placeholder="Enter Semester">
                        <span id="taskError" class="alert-message"></span>
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
    let _url     = `/semester`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "POST",
        data: {
            semester: task,
            _token: _token
        },
        success: function(data) {
                semester = data
                $('table tbody').append(`
                    <tr id="semester_${data.id}">
                        <td>${data.id}</td>
                        <td>${ data.semester }</td>
                        <td>
                            <a data-id="${ data.id }" onclick="editTodo(${data.id})" class="btn btn-info">Edit</a>
                            <a data-id="${data.id}" class="btn btn-danger" onclick="deleteTodo(${data.id})">Delete</a>
                        </td>
                    </tr>
                `);

                $('#task').val('');

                $('#addTodoModal').modal('hide');
        },
        error: function(response) {
            $('#taskError').text(response.responseJSON.errors.semester);
        }
    });
}

function deleteTodo(id) {
    let url = `/semester/${id}`;
    let token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url,
        type: 'DELETE',
        data: {
        _token: token
        },
        success: function(response) {
            $("#semester_"+id).remove();
        }
    });
}

function editTodo(e) {
    var id  = $(e).data("id");
    var semester  = $("#semester_"+id+" td:nth-child(2)").html();
    $("#todo_id").val(id);
    $("#edittask").val(semester);
    $('#editTodoModal').modal('show');
}

function updateTodo() {
    var task = $('#edittask').val();
    var id = $('#todo_id').val();
    let _url     = `/semester/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: _url,
        type: "PUT",
        data: {
            semester: task, 
            _token: _token
        },
        success: function(data) {
                semester = data
                $("#semester_"+id+" td:nth-child(2)").html(matkul.semester);
                $('#todo_id').val('');
                $('#edittask').val('');
                $('#editTodoModal').modal('hide');
        },
        error: function(response) {
            $('#taskError').text(response.responseJSON.errors.semester);
        }
    });
}

</script>
@endsection