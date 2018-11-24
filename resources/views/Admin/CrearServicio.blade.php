@extends('layouts.app')
	@section('content')
		<main>
			<form action="" method="post">
				{{ csrf_field() }}
				<fieldset>
				@if(isset($data))
					@foreach($data as $d)
						<label>{{$d->nombre}}<input type="radio" name="opcion" value="{{$d->id}}"></label><br>
					@endforeach
					<input type="submit" name="s" value="Siguiente">
				@elseif(isset($opcion))
					@foreach($opcion as $o)
						<label>{{$o->nombre}}<input type="radio" name="opcion" value="{{$o->id}}"></label><br>
					@endforeach
					<input type="submit" value="Crear Servicio">
				@endif
				</fieldset>
			</form>
			<a href={{url('/Administrador')}}>Regresar</a>
		</main>
	@endsection