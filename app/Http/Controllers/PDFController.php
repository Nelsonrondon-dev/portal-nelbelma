<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;
use App\Pedido;
use App\Inventario;
class PDFController extends Controller
{
   


public function PDF(){
    $users = User::all();
    $pdf = PDF::loadView('pdf.usuarios', compact('users'));
    return $pdf->download('usuarios.pdf');

}


public function PDFInventario(){
    $inventarios = Inventario::all();
    $pdf = PDF::loadView('pdf.inventario', compact('inventarios'));
    return $pdf->download('inventario.pdf');

}

public function PDFPrecio(){
    $inventarios = Inventario::all();
    $pdf = PDF::loadView('pdf.precios', compact('inventarios'));
    return $pdf->download('precios.pdf');

}



public function PDFPedido($id){
 
        $pedidos = Pedido::where('numero_pedido', $id)->get();
       
        $pdf = PDF::loadView('pdf.pedidos', compact('pedidos'));
        return  $pdf->download('pedidos.pdf');
}

}
