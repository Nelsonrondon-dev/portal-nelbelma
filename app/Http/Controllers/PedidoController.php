<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use App\Pedido;
use App\User;
use App\Pago;
use Illuminate\Support\Facades\Auth;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
       
        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventarios  = Inventario::all();
        $pedidos  = Pedido::all();
        if (count($pedidos) >= 1)  {
            $ultimo_pedido2 = $pedidos->last();
            $ultimo_pedido =  $ultimo_pedido2->numero_pedido + 1;
            }
            else {
            $ultimo_pedido = 1;  
            }

         return view('pedido.create', ['inventarios' => $inventarios, 'ultimo_pedido' => $ultimo_pedido ] );

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
        //
        return view('pedido.edit', ['id' => $id]);
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
        $reportes = Pedido::where('numero_pedido', $id)->get();
        
        foreach( $reportes as $reporte)
        {
            $pago = new Pago();
            $pago->pedido_id = $reporte->id;
            $pago->numero_pedido = $id;
            $pago->banco = $request->get('banco');
            $pago->monto = $request->get('monto');
            $pago->referencia = $request->get('referencia');
            $pago->tipo_pago = $request->get('tipo_pago');
            if ($request->hasFile('file')) {
                $pago->capture = $request->file('file')->store('public');        
            } 
            $pago->save();

            $cantidad_total =+ $reporte->total;

            $reporte->pagado = 1;
            $reporte->update();
        }
   
        return redirect('pedido');
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
