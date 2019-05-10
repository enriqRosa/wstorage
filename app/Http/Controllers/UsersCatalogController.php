<?php

namespace App\Http\Controllers;

use App\UserCatalog;
use Laracast\Flash\Flash;
use Illuminate\Http\Request;

class UsersCatalogController extends Controller
{
      /**
     * Vista para mostrar formulario del catalogo
     */
    public function UserCatalog()
    {
        $user_catalog = UserCatalog::orderBy('cantidad','Asc')->paginate(5);
        return view('plantillas.user_catalog')->with('user_catalog',$user_catalog);
    }

     /**
     * Agregar más usuarios al catalogo de usuarios
     */
    public function storeUserCatalog(Request $request)
    {
        $user_catalog = new UserCatalog($request->all());
        $user_catalog->save();
        
       
        //retorna a la ruta ->user-catalog
        return back()->with('user_catalog' ,'Data inserted Successfully');       
    }
    //Eliminar un campo del catalogo usuarios
    public function destroyUserCatalog($id)
    {
        $user_catalog = UserCatalog::find($id);
        $user_catalog->delete();

        return back()->with('user_catalog_destroy' ,'Data deleted Successfully'); 
    }
}
