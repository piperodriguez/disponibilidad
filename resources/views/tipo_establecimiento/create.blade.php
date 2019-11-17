<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ url('js2/jquery.validate.js') }}"></script>
<form action="{{url('/tipo_establecimiento')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	@include('tipo_establecimiento.form', ['modo'=>'crear'])	
</form>