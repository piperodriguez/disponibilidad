<form action="{{url('/pais/'. $dato->id_pais)}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PATCH')}}
	@include('pais.form', ['modo'=>'editar'])
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{ url('js2/jquery.validate.js') }}"></script>
</form>
