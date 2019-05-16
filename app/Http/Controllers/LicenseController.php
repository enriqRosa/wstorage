<?php

namespace App\Http\Controllers;

use App\License;
use App\Company;
use App\UserCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
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
    public function createLicense()
    {
        return view('plantillas.add_license');
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
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function showLicenses(License $license)
    {
        $company_license=DB::select("SELECT * from company_license");
        return view('plantillas.status_license')->with('company_license',$company_license);
    }

    public function editLicense($license_id)
    {
        $license_edit=License::find($license_id);
        $user_catalog=DB::select('SELECT * FROM users_catalog');
        return view('plantillas.edit_license',compact('user_catalog','company_name'))->with('license_edit',$license_edit);
    }

    public function updateLicense(Request $request,$id)
    {
        $license=License::find($id);
        $license->tamano_total=$request->tamano_total;
        $license->licencia_total=$request->licencia_total;
        $license->save();
        
        return redirect('license-status')->with('license_update' ,'Data updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function destroyLicense($license_id)
    {
        $license = License::find($license_id);
        $license->delete();

        return back()->with('license_destroy' ,'Data deleted Successfully');
    }
}
