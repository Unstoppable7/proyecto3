@extends('layouts.suscriptor')
	@section('content')
	<form action="" method="post">
		{{csrf_field()}}
		<fieldset>
			<legend>Iniciar sesion</legend>
			@if(isset($data))
				<p>El nombre de usuario: {{$data['username']}} no existe!</p>
			@elseif(isset($n))
				<p>Usuario o Contraseña incorrecta</p>
			@endif
			<input type="text" name="username" placeholder="Nombre de usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<input type="submit" value="Iniciar">
		</fieldset>
	</form>
	<a href="{{url('/')}}">Regresar</a>
@endsection