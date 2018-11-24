@extends('layouts.app')
	@section('content')
		<main>
			@if(isset($datos) && $datos != null && $precio != null)
				<p>Usuario: {{$datos[0]->username}}</p>
				<p>Paquete: {{$datos[0]->paquete}}</p>
				<p>Factura: {{$precio[0]->precio}}</p>
			@else
				<form action="" method="post" autocomplete="off">
					{{csrf_field()}}
			        <fieldset>
			          <legend>Buscar Factura de Usuario</legend>
			          <label>Nombre de Usuario<input type="text" name="username" placeholder="Usuario" required pattern="[a-zA-Z0-9]{}"></label>
			          <input type="submit" class="Boton Submit" name="Enviado" value="Mostrar">
			        </fieldset>
		    	</form>
		    @endif
		    	<a href={{url('/Administrador')}}>Regresar</a>
		</main>
	@endsection