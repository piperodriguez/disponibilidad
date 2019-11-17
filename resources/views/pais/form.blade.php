<label for="nombre">{{'Nombre Pais'}}</label>
<input type="text" name="nombre" id="nombre" value="{{isset($dato->nombre)?$dato->nombre:''}}">
<input type="submit" value="{{$modo=='crear'?'Agregar':'Modificar'}}">
<a href="{{url('pais')}}">Cancelar</a>