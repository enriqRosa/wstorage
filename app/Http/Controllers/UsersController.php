<?php

namespace App\Http\Controllers;

use App\Users;
use App\User;
use App\Company;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser($company_id)
    {
        return view('plantillas.add_user',compact('company_id'));
    }
    //Agregar un nuevo usuario
    public function createUserPost(Request $request)
    {
        $user = new User;
        $user->nombre = $request->nombre_usuario;
        $user->apellidos = $request->apellidos_usuario;
        $user->email = $request->email_usuario;
        $user->tipo_usuario = $request->rol_usuario;
        $user->password = bcrypt($request->pass_usuario);
        $user->company_id = $request->company_id;
        $user->save();
        return redirect('companies');
    }

    /**
     * Agregar más usuarios al catalogo de usuarios
     */
    public function addUserCatalog()
    {
        return view('plantillas.user_catalog');
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
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function showUsers()
    {
        $user = User::with("company")->get();
        return view('plantillas.users',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, Users $users)
    {
        return view('plantillas.edit_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
