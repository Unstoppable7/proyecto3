@extends('layouts.app')
	@section('content')
		<main>
			<form action="" method="post">
				{{csrf_field()}}
				<fieldset>
					<legend>Carga de Canales</legend>
					@if(isset($datos))
						@for($i=0; $i<count($datos); $i++)
							<label>{{$datos[$i]}}<input type="radio" name="cable" value="{{$datos[$i]}}"></label>
						@endfor
						<input type="text" name="canales" placeholder="Canal1*Canal2*Canal3...">
					@endif
					<input type="submit" value="Agregar Canales">
				</fieldset>
			</form>
		</main>
		<a href={{url('/Administrador')}}>Regresar</a>
	@endsection