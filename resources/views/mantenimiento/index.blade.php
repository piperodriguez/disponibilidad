@extends('layouts.app')
@section('content')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script type="application/javascript">
  	$(function() {
    	$("#accordion").accordion({
  			active: false,
  			collapsible: true
    	});
  	});
  	</script>
	<h1 align="center">Modulo de Mantenimiento</h1>
	<div class="container">
		<div id="accordion">
			  <h3> <i class="far fa-address-card"></i>  Administración de Usuarios</h3>
			  <div>
				<ul class="list-inline">
				   <li class="list-inline-item">
				   	<a class="social-icon text-xs-center" target="_blank" href="{{ route('usuarios.index') }}">
				   		<strong style="text-transform: uppercase;">Lista de Usuarios</strong>
						<br><br>
						<center>
							<i class="fas fa-portrait fa-3x"></i>
						</center>
				   	</a>
				   </li>
				   <li class="list-inline-item">
				   	<a class="social-icon text-xs-center" target="_blank" href="#">
				   		<strong style="text-transform: uppercase;">Permisos Usuario</strong>
				   		<br><br>
				   		<center>
				   			<i class="fas fa-user-cog fa-3x"></i>
				   		</center>
				   	</a>
				   </li>
				</ul>
			  </div>
			  <h3>Section 2</h3>
			  <div>
			    <p>
			    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
			    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
			    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
			    suscipit faucibus urna.
			    </p>
			  </div>
			  <h3>Section 3</h3>
			  <div>
			    <p>
			    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
			    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
			    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
			    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
			    </p>
			    <ul>
			      <li>List item one</li>
			      <li>List item two</li>
			      <li>List item three</li>
			    </ul>
			  </div>
			  <h3>Section 4</h3>
			  <div>
			    <p>
			    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
			    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
			    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
			    mauris vel est.
			    </p>
			    <p>
			    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
			    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
			    inceptos himenaeos.
			    </p>
			  </div>
			</div>
	</div>
@endsection