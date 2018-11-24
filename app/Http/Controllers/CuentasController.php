<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
	public function Iniciar(Request $request){
		$data = $request->except('_token');
		$user = DB::select('SELECT clave, tipo FROM usuarios WHERE username = :a', ['a'=>$data['username']]);
		if($user == null)
			return view('General.IniciarSesion', compact('data'));

		else if($data['clave'] == $user[0]->clave){
			if($user[0]->tipo == 'Admin'){
				session(['tipo'=>'Admin']);
				session(['username'=>$data['username']]);
				return redirect('Administrador');
			}
			else{
				session(['tipo'=>'Suscr']);
				session(['username'=>$data['username']]);
				return redirect('Suscriptor');
			}
		}

		else{
			$n = 'n';
			return view('General.IniciarSesion', compact('n'));
		}
	}

	public function Registrar(Request $request){
		$data = $request->except('_token');
		$user = DB::select('SELECT username FROM usuarios WHERE username = :a', ['a'=>$data['username']]);
		if($user != null)
			return view('General.Registrarse', compact('user'));

		DB::insert('INSERT INTO usuarios(nombre, username, clave, tipo) VALUES(:nombre,:username,:clave,:tipo)', $data);
		return redirect('IniciarSesion');
	}
}
