<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $contrasena = base64_encode($request->acceso);
    $usuario = DB::table('public.par_ciu')->select('idprov', 'razon', 'telefono', 'correo', 'foto','idseq')
      ->where('idprov', $request->correo)
      ->where('clave', $contrasena)
      ->where('estado', 'S')->get();

    if (count($usuario) != 0) {
      foreach ($usuario as $usu) {
        Session::put('idprov', $request->correo);
        Session::put('nombre', $usu->razon);
        Session::put('correo', $usu->correo);
        Session::put('telefono', $usu->telefono);
        Session::put('foto', $usu->foto);
        Session::put('idseq', $usu->idseq);
        $razon = $usu->razon;
      }
      return redirect('inicio')->with('status', 'Bienvenido! '. $razon);
      
    }else{
      return redirect('login')->with('status', 'Credenciales incorrectas!');
    }
  }

  public function logout()
  {
    Session::flush();
    return redirect('login');
  }
}
