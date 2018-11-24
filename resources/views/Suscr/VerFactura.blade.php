@extends('layouts.suscriptor')
	@section('content')
	@if($precio != null)
		@foreach($data as $d)
			<p>{{$d->nombre}}</p>
			<p>{{$d->paquete}}</p>
			<p>{{$precio[0]->precio}}</p>
		@endforeach
	@endif
	<a href="{{url('Suscriptor')}}">Regresar</a>
@endsection