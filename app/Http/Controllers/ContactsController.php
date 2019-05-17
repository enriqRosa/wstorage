<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    //MUESTRA LOS CONTACTOS DE LA BD EN LA VISTA
    public function showContacts($id)
    {
        $company_contacts=DB::select('SELECT companies.id as company_id, contacts.* from contacts
                                      inner join companies
                                      on companies.id=contacts.company_id
                                      where contacts.company_id=?',[$id]);

        $company_id=DB::select('SELECT companies.id as company_id from companies
        inner join contacts
        on companies.id=contacts.company_id
        where contacts.company_id=?',[$id]);
       
        return view ('plantillas.contacts',compact('company_contacts','company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //FORMULARIO CON ID DE LA EMPRESA
    public function storeContact($company_id)
    {
        return view('plantillas.add_contact',compact('company_id'));
    }

    //AGREGAR UN NUEVO CONTACTO A LA BD
    public function storeContactPost(Request $request)
    {
        $this->validate($request,[
            'name' => 'max:15|alpha_dash', 
            'last_name' => 'max:15|alpha',
            'email' => 'max:50|email|unique:contacts',
            'telephone' => 'numeric'
        ]);

        $contact=new Contacts;
        $contact->nombre = strtoupper($request->name);
        $contact->apellidos = strtoupper($request->last_name);
        $contact->email = $request->email;
        $contact->telefono = $request->telephone;
        $contact->ocupacion = $request->ocupation;
        $contact->company_id = $request->company_id;
        $contact->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function updateContact(Request $request, Contacts $contacts)
    {
        return view('plantillas.edit_contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    //FUNCIÓN PARA ELIINAR UN CONTACTO EN ESPECIFICO
    public function destroyContact($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        return back()->with('contact-destroy','Contact deleted Successfully');
    }
}
