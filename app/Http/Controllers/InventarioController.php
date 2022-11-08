<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dolar;
use App\Inventario;
use Http;

class InventarioController extends Controller
{

public function __construct(){

    $this->middleware('role');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta2 =  Http::get('https://s3.amazonaws.com/dolartoday/data.json');
        
        $inventarios = Inventario::all();
        $dolars = Dolar::all(); 
        $dolar_today = $respuesta2->json();   
          
       
        return view('inventario.index', ['inventarios' => $inventarios , 'dolars' => $dolars ], compact('dolar_today'));
     
        //  return dd($dolars);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventario = new Inventario();
        $inventario->nombre_producto = request('name_producto');
        $inventario->cantidad_comprada  = request('cantidad_c');
        $inventario->cantidad_actual  = request('cantidad_c');
        $inventario->unidad  = request('unidad');
        $inventario->iva  = request('iva');
        $inventario->precio_unidad  = request('p-compra');
        $inventario->precio_unidad_actual = request('p-venta');
        $inventario->pago = '0';

        $inventario->save();
       
        return redirect('inventario');
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

        $inventario = Inventario::findOrFail($id);

        return view('inventario.edit', ['inventario' => $inventario]);
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
        $inventario = Inventario::findOrFail($id);
        $inventario->nombre_producto = $request->get('name_producto');
        $inventario->cantidad_comprada  = $request->get('cantidad_c');
        $inventario->cantidad_actual  = $request->get('cantidad_a');
        $inventario->unidad  = $request->get('unidad');
        if ($request->get('iva') == '1') { $inventario->iva  = 1; }
        else { $inventario->iva  = 0;}
        $inventario->precio_unidad  = $request->get('p-compra');
        $inventario->precio_unidad_actual = $request->get('p-venta');
        $inventario->pago = $request->get('f-pago');

        $inventario->update();
        return redirect('inventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Inventario::findOrFail($id);
        $usuario->delete();

        return redirect('inventario');

    }
}
