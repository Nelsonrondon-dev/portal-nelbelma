<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\User;
use App\Inventario;

class ReportesController extends Controller
{
   
    public function index()
    {
         $users = User::all()->count();
         $iventario = Inventario::all()->count();
        return view('reportes.index', ['users' => $users, 'iventario'=> $iventario]) ;
    }


    public function create()
    {
      return  view('reportes.create') ;
    }

 
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
