<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Image;

class ProductosController extends Controller
{
    public function index()
    {
        if (Session::get('correo')) {
            $idseq = Session::get('idseq');
            $productos = DB::table('app.view_producto_app')->where('idseq', $idseq)->get();
            return view('productos.index', compact('productos'));
        } else {
            return redirect('login')->with('status', 'Su sesión ha expirado inicie sesión');
        }
    }

    public function create(){
        if(Session::get('correo')){
            $categorias = DB::table('public.web_categoria')->get();
            $especialidades = DB::table('public.par_catalogo')->where('tipo', 'especialidades')->get();
            return view('productos.create', compact( 'categorias', 'especialidades'));
        }else{
            return redirect('login')->with('status', 'Su sesión ha expirado inicie sesión');
        }
    }

    public function store(Request $request){

        $nombre = $request->nombre;
        $idcategoria = $request->idcategoria;
        $descripcion = $request->detalle;
        $costo = $request->costo;
        $idespecial = $request->idespecial;
        if ($request->hasFile('FOTO')) {
            $archivo = $request->file('FOTO');
            $FOTO =  str_replace(' ', '', $archivo->getClientOriginalName());
            // $FOTO = trim($empresa," " ).time() . trim($archivo->getClientOriginalName()," ");
            $image_resize = Image::make($archivo->getRealPath());
            $image_resize->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('images/empresa/' . $FOTO));
            $FOTO = 'https://g-kaipi.cloud/go-q/empresa/public/images/empresa/' . $FOTO;
        } else {
            $FOTO = $request->FOTO;
        }

        DB::table('public.web_producto')->insert([
            'producto' => $nombre,
            'referencia' => $descripcion,
            'tipo' => 'S',
            'estado' => 'S',
            'unidad' => 'Unidad',
            'facturacion' => 'S',
            'url' => $FOTO,
            'id_especial' => $idespecial,
            'idcategoria' => $idcategoria,
            'costo' => $costo,
            'idseq' => Session::get('idseq')
        ]);
        return redirect(route('productos.index'))->with('status', 'Producto guardado exitosamente!');
    }

    public function edit($idproducto)
    {
        if (Session::get('correo')) {
            $producto = DB::table('public.web_producto')->where('idproducto', $idproducto)->get();
            $categorias = DB::table('public.web_categoria')->get();
            $especialidades = DB::table('public.par_catalogo')->where('tipo', 'especialidades')->get();
            return view('productos.edit', compact('producto', 'categorias', 'especialidades'));
        } else {
            return redirect('login')->with('status', 'Su sesión ha expirado inicie sesión');
        }
    }

    public function update(Request $request)
    {
        if (Session::get('correo')) {
            $idproducto = $request->idproducto;
            $nombre = $request->nombre;
            $idcategoria = $request->idcategoria;
            $descripcion = $request->detalle;
            $costo = $request->costo;
            $idespecial = $request->idespecial;
            if ($request->hasFile('FOTO')) {
                $archivo = $request->file('FOTO');
                $FOTO =  str_replace(' ', '', $archivo->getClientOriginalName());
                // $FOTO = trim($empresa," " ).time() . trim($archivo->getClientOriginalName()," ");
                $image_resize = Image::make($archivo->getRealPath());
                $image_resize->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('images/empresa/' . $FOTO));
                $FOTO = 'https://g-kaipi.cloud/go-q/empresa/public/images/empresa/' . $FOTO;
            } else {
                $FOTO = $request->FOTOE;
            }

            DB::table('public.web_producto')->where('idproducto', $idproducto)->update([
                'producto' => $nombre,
                'referencia' => $descripcion,
                'url' => $FOTO,
                'id_especial' => $idespecial,
                'idcategoria' => $idcategoria,
                'costo' => $costo
            ]);
            return redirect(route('productos.index'))->with('status', 'Producto actualizado exitosamente!');
        } else {
            return redirect('login')->with('status', 'Su sesión ha expirado inicie sesión');
        }
    }
    public function destroy($idproducto)
    {
        DB::table('public.web_producto')->where('idproducto', $idproducto)->delete();
    }
}
