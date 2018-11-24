@extends('layouts.app')
	@section('content')
	<form autocomplete="off" method="post" action="">
		{{csrf_field()}}
        <fieldset>
			<legend>Carga de programacion semanal</legend>
			<label>Nombre del canal<input type="text" name="canal" placeholder="Canal" required pattern="[a-zA-Z0-9]{}" maxlength="10"></label>
			<label>Nombre del programa<input type="text" name="programa" placeholder="Programa" required pattern="[a-zA-Z0-9]{}" maxlength="20"></label>
			<label><input type="radio" name="dia" value="Lunes" required><span class="Color">Lunes</span></label>
			<label><input type="radio" name="dia" value="Martes"><span class="Color">Martes</span></label>
			<label><input type="radio" name="dia" value="Miercoles"><span class="Color">Miercoles</span></label>
			<label><input type="radio" name="dia" value="Jueves"><span class="Color">Jueves</span></label>
			<label><input type="radio" name="dia" value="Viernes"><span class="Color">Viernes</span></label>
			<label><input type="radio" name="dia" value="Sabado"><span class="Color">Sabado</span></label>
			<label><input type="radio" name="dia" value="Domingo"><span class="Color">Domingo</span></label>
			<label>Hora inicial del programa<input type="time" name="horaI" required min="00:00" max="23:30"></label>
			<label>Hora final del programa<input type="time" name="horaF" required min="00:00" max="23:30"></label>
			<input type="submit" value="Agregar Programacion">
        </fieldset>
      </form>
      <a href="{{url('Administrador')}}">Regresar</a>
@endsection