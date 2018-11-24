@extends('layouts.suscriptor')
	@section('content')
	<form action="" method="post">
		{{csrf_field()}}
		<fieldset>
			<legend>Registro nuevo usuario</legend>
			@if(isset($user))
				<p>El usuario: {{$user[0]->username}} ya existe!</p>
			@endif
			<input type="text" name="nombre" placeholder="Nombre y Apellido">
			<input type="text" name="username" placeholder="Nombre de usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<input type="hidden" name="tipo" value="Suscr">
			<input type="submit" value="Registrarse">
		</fieldset>
	</form>
	<a href="{{url('/')}}">Regresar</a>
@endsection