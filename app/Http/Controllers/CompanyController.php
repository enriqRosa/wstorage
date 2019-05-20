<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCompany()
    {
        return view('plantillas.add_company');
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function showCompanies(Company $company)
    {
        $rol= \Auth::user()->tipo_usuario;
        if($rol === 'SUPER'){
            $company=Company::orderBy('id')->paginate();
        }
        if($rol === 'ADMIN'){
            $id_company= \Auth::user()->company_id;
            $company = DB::select("SELECT c.* 
            from users as u, companies as c
            where u.company_id = c.id
            and u.company_id = '$id_company'
            group by c.id;");
        }
        
        return view('plantillas.company_list',compact('company'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(Request $request, Company $company)
    {
        return view('plantillas.edit_company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        
    }
}
