<table class="table table-light" border="1">
	<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Descripción</th>
			</tr>
	</thead>
	<tbody>
	@foreach($tipo_establecimiento as $tipo_establecimiento)
	<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$tipo_establecimiento->descripcion}}</td>
		<td>
			<a href="{{url('/tipo_establecimiento/'. $tipo_establecimiento->id_testablecimiento.'/edit')}}">Edit</a>
            <form action="{{ route('tipo_establecimiento.destroy', $tipo_establecimiento->id_testablecimiento)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
	</tr>
	@endforeach
</tbody>
</table>
<a href="{{url('tipo_establecimiento/create')}}">Agregar establecimiento</a>
