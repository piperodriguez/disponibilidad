<label for="descripcion">{{'Descripcion'}}</label>
<input type="text" name="descripcion" id="descripcion" value="{{isset($dato->descripcion)?$dato->descripcion:''}}">
<input type="submit" value="{{$modo=='crear'?'Agregar':'Modificar'}}">
<a href="{{url('tipo_establecimiento')}}">Cancelar</a>