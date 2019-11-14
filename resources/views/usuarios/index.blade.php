@extends('layouts.app')

@section('content')
<div class="container">
	<h1>lista de usuarios</h1>
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
        <tbody>
            @forelse($datos['usuarios'] as $usuario)
            <tr>
                <td>{{$usuario['username']}}</td>
                <td>{{$usuario['email']}}</td>
                <td>{{$usuario['created_at']}}</td>
                <td>{{$usuario['updated_at']}}</td>
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
</div>
<script type="text/javascript">
	$(document).ready(function() {
	  $('#example').DataTable();
	});
</script>
@endsection