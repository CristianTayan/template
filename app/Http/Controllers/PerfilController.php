<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function index()
    {
        if (Session::get('idprov')) {
            $idseq = Session::get('idprov');
            $usuario = DB::table('app.view_todas_empresas')->where('idprov', $idseq)->get();
            return view('perfil.index', compact('usuario'));
        } else {
            return redirect('login')->with('status', 'Su sesión ha expirado inicie sesión');
        }
    }

    public function cambiar_ubicacion()
    {
        $idseq = Session::get('idprov');
        $usuario = DB::table('app.view_todas_empresas')->where('idprov', $idseq)->get();
        return view('perfil.ubicacion', compact('usuario'));
    }
    public function actualizar_ubicacion(Request $request)
    {
        $idseq = Session::get('idprov');
        $calle_principal = $request->calle_principal;
        $calle_secundaria = $request->calle_secundaria;
        $lat = $request->lat;
        $lng = $request->lng;
        $val = DB::table('public.par_ciu')->where('idprov', $idseq)->update([
                'coordenadax' => $lat,
                'coordenaday' => $lng,
                'calle_principal' => $calle_principal,
                'calle_secundaria' => $calle_secundaria,
                'direccion' => $calle_principal . " y " . $calle_secundaria
            ]);

        return redirect('perfil_socio')->with('status', 'Ubicación actualizada con éxito! ');
    }
}
