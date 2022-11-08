<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Pedido;
use App\Factura;
use App\Relacion;
use App\Inventario;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        
        return  view('pago.index', ['pedidos' => $pedidos]);
        // return (dd($pedidos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagos = Pago::where('numero_pedido', $id)->get();


        foreach( $pagos as $pago)
        {
            $factura = new Factura();
            $factura->pago_id = $pago->id;
            $factura->numero_pedido = $id;
            $factura->total = $pago->monto;
            $factura->save();


        }

        $pedidos = Pedido::where('numero_pedido', $id)->get();


        foreach( $pedidos as $pedido)
        {
        
            $pedido->despachado = 1;
            $pedido->update();

            $relacion = Relacion::where('pedido_id', $pedido->id)->first();
            $inventario = Inventario::where('id_inventario', $relacion->inventario_id)->first();
            $inventario->cantidad_actual = $inventario->cantidad_actual - $relacion->cantidad;
            $inventario->update();

        }


        
        return redirect('pago');






   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
