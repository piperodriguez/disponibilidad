<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ url('js2/jquery.validate.js') }}"></script>
<form action="{{url('/pais')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	@include('pais.form', ['modo'=>'crear'])	
</form>