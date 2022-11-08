<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\Pedido;
use App\Relacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AjaxController extends Controller
{
    public function ajaxRequestPost(Request $request)
    {

        $producto_datos = Inventario::where('id_inventario', $request->producto_id)->get();

        return response()->json(['datos' => $producto_datos]);

    }

    public function ajaxRequestStore(Request $request)
    {
        $pedidos = new Pedido();
        $pedidos->numero_pedido = $request->pedido_numero;
        $pedidos->user_id = Auth::user()->id;
        $pedidos->nombre_producto = $request->producto;
        $pedidos->cantidad = $request->cantidad;
        $pedidos->precio_und = $request->precio;
        $pedidos->total = $request->total;
        $pedidos->despachado = '0';
        $pedidos->pagado = '0';

        $pedidos->save();

        $relacion = new Relacion();
        $relacion->inventario_id = $request->producto_id;
        $relacion->cantidad = $request->cantidad;
        $relacion->pedido_id = $pedidos->id;

        $relacion->save();
        $respuesta = $request->actual;

        return response()->json(['pedidosregreso' => $respuesta]);

    }

    public function ajaxRequestReporte(Request $request)
    {

        $desde = date($request->desde);
        $hasta = date($request->hasta);

        $pedidos = Pedido::whereBetween('created_at', [$desde, $hasta])->get();

        $pdf = PDF::loadView('pdf.pedidos', compact('pedidos'));
        return $pdf->download('pedidos.pdf');

    }
}
