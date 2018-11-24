@extends('layouts.app')
	@section('content')
		<main>
			<form autocomplete="off" method="post" action="">
				{{csrf_field()}}
		        <fieldset>
		          <legend>Administrar Usuario</legend>
		          <label>Nombre de Usuario<input type="text" name="username" placeholder="Usuario"></label>
		          <label><input type="radio" name="tipo" value="Suscr" required><span class="Color">Suscriptor</span></label>
		          <label><input type="radio" name="tipo" value="Admin"><span class="Color">Administrador</span></label>
		          <input type="submit" class="Boton Submit" name="Enviado" value="Administrar">
		        </fieldset>
		    </form>
		</main>
		<a href={{url('/Administrador')}}>Regresar</a>
	@endsection