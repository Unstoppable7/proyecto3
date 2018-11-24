<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SuscriptorController extends Controller
{
	public function Menu(){
		if(!$this->ComprobarSuscr())
			return redirect('/');

		return view('Suscr.Menu');
	}

	public function VerFactura(){
		if(!$this->ComprobarSuscr())
			return redirect('/');
		$data = DB::select('SELECT nombre, paquete FROM usuarios WHERE username = :a', ['a'=>session('username')]);
		$precio = DB::select('SELECT precio FROM paquetes WHERE nombre = :a', ['a'=>$data[0]->paquete]);
		return view('Suscr.VerFactura', compact('data', 'precio'));
	}

	public function CambiarPaquete(Request $r){
		if(!$this->ComprobarSuscr())
			return redirect('/');
		if($r->isMethod('get')){
			$data = DB::select('SELECT nombre FROM paquetes');
			return view('Suscr.CambiarPaquete', compact('data'));
		}
		else{
			$paquete = $r->input('paquete');
			DB::insert('INSERT INTO solicitudes(username, paquete) VALUES(:a, :b)', ['a'=>session('username'), 'b'=>$paquete]);
			return redirect('Suscriptor');
		}
	}

	private function ComprobarSuscr(){
		if(session('tipo') == null || session('tipo') != 'Suscr')
			return false;

		return true;
	}
}
