<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dolar;
use App\Inventario;
use Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 
        $respuesta2 =  Http::get('https://s3.amazonaws.com/dolartoday/data.json');
        
        $inventarios = Inventario::paginate(4);
        $dolars = Dolar::all(); 
        $dolar_today =  $respuesta2->json();  
       
        $dolars = Dolar::all(); 

         if ($dolar_today['USD']['sicad2'] == null) {
            foreach ($dolars as $dolar) {
            $dolar_today['USD']['sicad2'] = $dolar->valor; 
            $dolar_today['USD']['promedio'] = $dolar->valor;
            } 
          }


        return view('home', ['inventarios' => $inventarios , 'dolars' => $dolar_today['USD']['sicad2'], 'dolars2' =>  $dolar_today['USD']['promedio'] ]);


    }



        public function contanos(){

            return view( 'contactanos' );
            
        }

}
