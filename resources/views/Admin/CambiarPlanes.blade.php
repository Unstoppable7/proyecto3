@extends('layouts.app')
	@section('content')
		<main>
			<form action="" method="post">
				{{csrf_field()}}
				<fieldset>
					<legend>Solicitudes cambio de paquetes</legend>
					@if($data != null)
						@foreach($data as $d)
							<label>{{$d->username}}<input type="radio" name="solicitud" value="{{$d->username}}">
								<input type="hidden" name="paquete" value="{{$d->paquete}}">
							<p>{{$d->paquete}}</p>
							<hr>
							</label>
						@endforeach
						<label>Aceptar<input type="radio" name="opcion" value="si"></label>
						<label>Denegar<input type="radio" name="opcion" value="no"></label>
					@endif
				<input type="submit" value="Cambiar">
				</fieldset>
			</form>
		</main>
		<a href={{url('/Administrador')}}>Regresar</a>
	@endsection