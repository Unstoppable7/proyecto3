@extends('layouts.suscriptor')
	@section('content')
	<form action="" method="post">
		{{csrf_field()}}
		<fieldset>
			<legend>Paquetes disponibles</legend>
			@if(isset($data))
				@foreach($data as $d)
					<label>{{$d->nombre}}<input type="checkbox" name="paquete" value="{{$d->nombre}}"></label>
				@endforeach
			@endif
			<input type="submit" value="Cambiar paquete">
		</fieldset>
		<a href="{{url('Suscriptor')}}">Regresar</a>
	</form>
@endsection