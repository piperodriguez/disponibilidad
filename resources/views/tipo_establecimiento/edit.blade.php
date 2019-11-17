<form action="{{url('/tipo_establecimiento/'. $dato->id_testablecimiento)}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PATCH')}}
	@include('tipo_establecimiento.form', ['modo'=>'editar'])
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{ url('js2/jquery.validate.js') }}"></script>
</form>
