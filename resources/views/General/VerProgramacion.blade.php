@extends('layouts.suscriptor')
	@section('content')
	@if(isset($data) && $data != null)
		@foreach($data as $d)
			<p>{{$d->canal}}</p>
			<p>{{$d->programa}}</p>
			<p>{{$d->dia}}</p>
			<p>{{$d->horaI}}</p>
			<p>{{$d->horaF}}</p>
			<hr>
		@endforeach
	@endif

	<form action="" method="post">
		{{csrf_field()}}
		<fieldset>
			<legend>Busqueda de programacion</legend>
			<labe>Canal<input type="radio" name="opcion" value="canal"></labe>
			<label>Programa<input type="radio" name="opcion" value="programa"></label>
			<input type="text" name="valor" placeholder="Canal o Programa">
			<label>Todo<input type="radio" name="opcion" value="todo"></label>
			<input type="submit" value="Buscar">
		</fieldset>
	</form>
	<a href="{{url('/')}}">Regresar</a>
@endsection