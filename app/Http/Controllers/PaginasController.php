<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
	public function Inicio(){
		if(session()->has('tipo'))
			session()->flush();

		return view('General.Inicio');
	}

	public function IniciarSesion(){
		return view('General.IniciarSesion');
	}

	public function Registrarse(){
		return view('General.Registrarse');
	}

	public function VerProgramacion(Request $r){
		if($r->isMethod('get'))
			return view('General.VerProgramacion');
		
		else{
			$data;
			if($r->input('opcion') == 'canal')
				$data = DB::select('SELECT canal, programa, dia, horaI, horaF FROM programacion WHERE canal=:a',['a'=>$r->input('valor')]);
			else if($r->input('opcion') == 'programa')
				$data = DB::select('SELECT canal, programa, dia, horaI, horaF FROM programacion WHERE programa=:a', ['a'=>$r->input('valor')]);
			else
				$data = DB::select('SELECT canal, programa, dia, horaI, horaF FROM programacion');
			if($data != null)
				return view('General.VerProgramacion', compact('data'));
			else
				return view('General.VerProgramacion');
		}	

	}
}
