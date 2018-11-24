@extends('layouts.app')
	@section('content')
		<main>
			<form action="" method="post">
				{{csrf_field()}}
				<fieldset>
				@if(isset($datos))
					@for($i=0; $i<count($datos); $i++)
						<label>{{$datos[$i]}}<input type="checkbox" name="{{$i}}" value="{{$datos[$i]}}"></label>
					@endfor
				@endif
					<input type="text" name="nombre" placeholder="Nombre del Paquete">
					<input type="text" name="precio" placeholder="0.0000">
				<input type="submit" value="Crear Paquete">
				</fieldset>
			</form>
		</main>
		<a href={{url('/Administrador')}}>Regresar</a>
	@endsection