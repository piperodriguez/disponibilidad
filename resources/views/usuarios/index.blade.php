@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-12">
         <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-user">Add User</a>
         <!--Inicio construcción de la tabla-->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>Nombre Usuario</th>
                  <th>Email</th>
                  <th>Fecha Creación</th>
                  <th>Fecha Ultima modificación</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody id="users-crud">
               @forelse($datos['usuarios'] as $usuario)

               <tr id="user_id_{{ $usuario['id'] }}">
                  <td>{{$usuario['username']}}</td>
                  <td>{{$usuario['email']}}</td>
                  <td>{{$usuario['created_at']}}</td>
                  <td>{{$usuario['updated_at']}}</td>
                  <td>
                    <button id="{{ $usuario['id'] }}" onclick="editClick(this)">Edit</button>
                    <button id="{{ $usuario['id'] }}" onclick="deleteClick(this)">Eliminar</button>
                </td>
               </tr>
               @empty
               <p>No se encuentran resultados</p>
               @endforelse
            </tbody>
            <tfoot>
               <tr>
                  <th>Nombre Usuario</th>
                  <th>Email</th>
                  <th>Fecha Creación</th>
                  <th>Fecha Ultima modificación</th>
                  <th>Acciones</th>
               </tr>
            </tfoot>
         </table>
         </table>
         {{ $datos['usuarios']->links() }}
      </div>
   </div>
</div>
<!--Ventana Modal-->
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrudModal"></h4>
        </div>
        <div class="modal-body">
            <form id="userForm" name="userForm" class="form-horizontal">
               <input type="hidden" name="user_id" id="user_id">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName" value="" maxlength="50" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required="">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="create">Guardar Cambios</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
        //tabla
        $('#example').DataTable().data().each(function (d){ console.log(d) });;
        //crud ajas se carga el token de seguridad que se debe enviar
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /*  Cuando usuario le de click al btn nuevo usuario */
        $('#create-new-user').click(function () {
            $('#btn-save').val("create-user");
            $('#userForm').trigger("reset");
            $('#userCrudModal').html("Add New User");
            $('#ajax-crud-modal').modal('show');
        });

 if ($("#userForm").length > 0) {

      $("#userForm").validate({

     submitHandler: function(form) {


      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');

      $.ajax({
          data: $('#userForm').serialize(),
          url: "https://www.tutsmake.com/laravel-example/ajax-crud/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              var user = '<tr id="user_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + '</td>';
              user += '<td><a href="javascript:void(0)" id="edit-user" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
              user += '<td><a href="javascript:void(0)" id="delete-user" data-id="' + data.id + '" class="btn btn-danger delete-user">Delete</a></td></tr>';


              if (actionType == "create-user") {
                  $('#users-crud').prepend(user);
              } else {
                  $("#user_id_" + data.id).replaceWith(user);
              }

              $('#userForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');

          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}

   });

    function editClick (obj) {
          var idUsuario = $(obj).attr('id');
          var employeeID = $(obj).closest('tr').find('td:first').html();
          $.get('usuarios/' + idUsuario +'/edit', function (data) {
             $('#userCrudModal').html("Edit User");
              $('#btn-save').val("edit-user");
              $('#ajax-crud-modal').modal('show');
              $('#user_id').val(data.id);
              $('#username').val(data.username);
              $('#email').val(data.email);
          })

    }

    function deleteClick (obj) {
          if( confirm(" Eliminar el registro Confirme !") == true ){
            var idUsuario = $(obj).attr('id');
            var employeeID = $(obj).closest('tr').find('td:first').html();
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('usuarios')}}"+'/'+idUsuario,
                    success: function (data) {
                        $("#user_id_" + idUsuario).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            return true;
          } else{
            return false;
          }
    }

</script>
@endsection
