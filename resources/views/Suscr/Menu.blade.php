@extends('layouts.suscriptor')
	@section('content')
	<a href="{{url('/Suscriptor/VerFactura')}}">Ver factura</a>
	<a href="{{url('/Suscriptor/CambiarPaquete')}}">Cambiar paquete</a>
	<a href="{{url('/')}}">Salir</a>
@endsection