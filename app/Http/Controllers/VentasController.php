<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class VentasController extends Controller
{
    public function home(Request $request)
    {
        $fecha = $request->fecha;
        // echo $fecha;
        if (Session::get('correo')){
            if ($fecha) {
                $fecha = $request->fecha;
                $idseq = Session::get('idseq');
                $pedidos = DB::table('app.view_pedido_cliente')->where('idseq', $idseq)->whereDate('fecha_enviado', DATE($fecha))->orderBy('fecha_enviado')->get();
                return view('ventas.index', compact('pedidos', 'fecha'));
                
            }else{
                $fecha = Carbon::today();
                $date = $fecha->format('d-m-Y');
                $idseq = Session::get('idseq');
                $pedidos = DB::table('app.view_pedido_cliente')->where('idseq', $idseq)->whereDate('fecha_enviado', DATE($date))->orderBy('fecha_enviado')->get();
                return view('ventas.index', compact('pedidos', 'fecha'));
            }
        }else{
            return redirect('login')->with('status', 'Su sesión ha expirado inicie sesión');
        }
    }

    public function ver_detalle($nropedido)
    {
        $pedido = DB::table('app.view_pedido_cliente')->where('nropedido', $nropedido)->get();
        foreach ($pedido as $p) {
            $date = Carbon::parse($p->fecha_enviado)->locale('es');
            $fecha = $date->translatedFormat('l, j F Y');
            $hora = $date->translatedFormat('H:m');
        }
        $detalles = DB::table('app.detalle_pedido')->where('nropedido', $nropedido)->get();
        return view('ventas.detalle', compact('detalles', 'pedido', 'fecha', 'hora'));
    }
}
