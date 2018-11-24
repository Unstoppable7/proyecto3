<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{	
	public function Menu(){
		if(!$this->ComprobarAdmin())
			return redirect('/');

		return view('Admin.Menu');
	}

	public function CrearServicio(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get')){
			$data = DB::select('SELECT id, nombre FROM servicios');
			return view('Admin.CrearServicio', compact('data'));
		}

		else if($r->input('s') != null){
			$opcion = $r->input('opcion');
			$opcion = DB::select('SELECT id, nombre FROM opciones WHERE idServicio = :a', ['a'=>$opcion]);
			return view('Admin.CrearServicio', compact('opcion'));
		}

		else{
			DB::insert('INSERT INTO servicios_creados(idServicio) VALUES(:a)', ['a'=>$r->input('opcion')]);
			return redirect('Administrador');
		}
	} 

	public function CrearPaquete(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get')){
			$data = DB::select('SELECT idServicio FROM servicios_creados');
			$datos = array();
			foreach ($data as $d){
				$datos[] = DB::select('SELECT nombre FROM opciones WHERE id = :a', ['a'=>$d->idServicio])[0]->nombre;
			}
			return view('Admin.CrearPaquete', compact('datos'));
		}

		else{
			$data = $r->except('_token', 'nombre', 'precio');
			$data = implode('*', $data);
			$precio = floatval($r->input('precio'));
			DB::insert('INSERT INTO paquetes(nombre, opciones, precio) VALUES(:c, :a, :b)', ['a'=>$data, 'b'=>$precio, 'c'=>$r->input('nombre')]);
			return redirect('Administrador');
		}
	} 

	public function CargaCanales(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get')){
			$data = DB::select('SELECT idServicio FROM servicios_creados');
			$datos = array();
			foreach ($data as $d) {
				$dato = DB::select('SELECT nombre FROM opciones WHERE id = :a AND idServicio = :b', ['a'=>$d->idServicio, 'b'=>2]);
				if($dato != null)
					$datos[] = $dato[0]->nombre;
			}
			return view('Admin.CargaCanales', compact('datos'));
		}

		else{
			$canales = $r->input('canales');
			DB::insert('INSERT INTO canales(plan, canales) VALUES(:a, :b)', ['a'=>$r->input('cable'), 'b'=>$canales]);
			return redirect('Administrador');
		}
	}

	public function CargaProgramacion(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get'))
			return view('Admin.CargaProgramacion');
		else{
			$data = $r->except('_token');
			DB::insert('INSERT INTO programacion(canal, programa, dia, horaI, horaF) VALUES(:canal,:programa,:dia,:horaI,:horaF)', $data);
			return redirect('Administrador');
		}
	}

	public function FacturaUsuario(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get'))
			return view('Admin.FacturaUsuario');
		else{
			$datos = DB::select('SELECT username, paquete FROM usuarios WHERE username = :a', ['a'=>$r->input('username')]);
			if($datos != null)
				$precio = DB::select('SELECT precio FROM paquetes WHERE nombre = :a', ['a'=>$datos[0]->paquete]);
			return view('Admin.FacturaUsuario', compact('datos', 'precio'));
		}
	}

	public function CambiarPlanes(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get')){
			$data = DB::select('SELECT username, paquete FROM solicitudes');
			return view('Admin.CambiarPlanes', compact('data'));
		}

		else{
			$data = $r->except('_token');
			DB::insert('UPDATE usuarios SET paquete = :a WHERE username = :b', ['a'=>$data['paquete'], 'b'=>$data['solicitud']]);
			DB::delete('DELETE FROM solicitudes WHERE username = :a', ['a'=>$data['solicitud']]);
			return redirect('Administrador');
		}
	} 

	public function AdministrarUsuario(Request $r){
		if(!$this->ComprobarAdmin())
			return redirect('/');
		if($r->isMethod('get'))
			return view('Admin.AdministrarUsuario');
		else{

			DB::update('UPDATE usuarios SET tipo = :a WHERE username = :b', ['a'=>$r->input('tipo'), 'b'=>$r->input('username')]);
			return redirect('Administrador');
		}
	}

	private function ComprobarAdmin(){
		if(session('tipo') == null || session('tipo') != 'Admin')
			return false;

		return true;
	}
}
