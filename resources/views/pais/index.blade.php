<table class="table table-light" border="1">
	<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Nombre</th>
			</tr>
	</thead>
	<tbody>
	@foreach($pais as $pais)
	<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$pais->nombre}}</td>
		<td>
			<a href="{{url('/pais/'. $pais->id_pais.'/edit')}}">Edit</a>
            <form action="{{ route('pais.destroy', $pais->id_pais)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
	</tr>
	@endforeach
</tbody>
</table>
<a href="{{url('pais/create')}}">Agregar Pais</a>
