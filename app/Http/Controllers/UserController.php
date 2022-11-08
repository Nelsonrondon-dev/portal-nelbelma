<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use App\Role;
use App\User;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware('role');
    }
   
    public function index()
    {
        //  public function index (){
            

        $users = User::paginate(6);

        return view('usuarios.index', ['users' => $users]);
    
    }

    public function create()
    {
        return view('usuarios.create');
    }

  
    public function store(Request $request)
    
    {   $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,']]);
        $usuario = new User();
        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = bcrypt(request('password'));
        $usuario->telefono = request('telefono_codigo').request('telefono');
           // Validacion de Imagen

           if ($request->hasFile('file')) {
            $usuario->avatar = $request->file('file')->store('public');        
        } 
        $usuario->save();
       
        User::all()->last()->asignarRol(3) ;

        return redirect('usuarios');
    }

   
    public function show($id)
    {
        
        return view('usuarios.show', ['user'=> User::findOrFail($id)]);
    }

  
    public function edit($id)
    {

        $user= User::findOrFail($id);
        $roles = Role::all();

        return view('usuarios.edit', ['user'=>$user], ['roles'=> $roles ]);
    }

   
    public function update(UserEditFormRequest $request, $id)
    {
        // Validadcion del Correo

        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,'.$id]]);

        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->telefono = request('telefono');


        // Validacion de Imagen

        if ($request->hasFile('file')) {
            $usuario->avatar = $request->file('file')->store('public');        
        } 

        // Validadcion de Password

        $pass =  $request->get('password');
        if ($pass != null) {
            $usuario->password = bcrypt(request('password'));
        }
        else {
            unset($usuario->password);
        }
        // Validadcion si existe rol asignado

        $role = $usuario->roles;
        if (count($role) > 0) {
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id'=> $request->get('rol')]);
        }

        else {
        User::find($id)->asignarRol($request->get('rol')) ;
        }
     
        $usuario->update();
       
        return redirect('usuarios');
    }

  
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect('usuarios');

    }
}
