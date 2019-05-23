<?php

namespace App\Http\Controllers;

use App\License;
use App\Company;
use App\UserCatalog;
use Redirect;
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
        $company_license=DB::select("SELECT * FROM company_license ORDER BY nombre");
        return view('plantillas.status_license')->with('company_license',$company_license);
    }

    public function showLicenseCompany($license_id)
    {
        $company_status=DB::select('SELECT * from company_license where license_id=?',[$license_id]);
        return view('plantillas.status_license')->with('company_status',$company_status);
    }
       
    public function editLicense($license_id)
    {
        $license_edit=License::find($license_id);
        $user_catalog=DB::select('SELECT * FROM users_catalog');
        return view('plantillas.edit_license',compact('user_catalog','license_edit'));
    }

    public function updateLicense(Request $request,$id)
    {
        $space_license = $this->space_license($id);
        $total_license = $this->total_license($id);
        $space_license_use = $this->space_license_use($id);
        $total_license_use = $this->total_license_use($id);
        $new_total_license = $request->tamano_total;
        $new_space = $request->licencia_total;
        if($space_license > $request->licencia_total and $total_license > $new_total_license){
            return Redirect::back()->with('success',"You can not allocate less space than you have. You can not assign fewer licenses than you have");
        }
        elseif($space_license == $request->licencia_total and $total_license == $new_total_license){
            return redirect()->route('showLicenses')->with('success',"Successfully updated data.");;
        }
        else{
            $new_space_license = $space_license + $new_space;
            $new_license_total = $total_license + $new_total_license;
            $update_license = $total_license_use + $new_total_license;
            $update_space = $space_license_use + $new_space;
            $update_license = DB::table('licenses')->where('id', $id)->update(array(
                'tamano_total' => $new_space_license, 'licencia_total' => $new_license_total,'tamano_restante' => $update_space, 'licencia_restante' => $update_license
            ));
            return redirect('license-status')->with('license_update' ,'Data updated Successfully');
        } 
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
    private function space_license($id)
    {
        $company_id = DB::table('licenses')->select('tamano_total')->where('id', '=', $id)->get();
        foreach ($company_id as $id_company) {
            foreach ($id_company as $id) {
                $id;
            }
        }
        return $id;
    }
    private function space_license_use($id)
    {
        $company_id = DB::table('licenses')->select('tamano_restante')->where('id', '=', $id)->get();
        foreach ($company_id as $id_company) {
            foreach ($id_company as $id) {
                $id;
            }
        }
        return $id;
    }
    private function total_license($id)
    {
        $company_id = DB::table('licenses')->select('licencia_total')->where('id', '=', $id)->get();
        foreach ($company_id as $id_company) {
            foreach ($id_company as $id) {
                $id;
            }
        }
        return $id;
    }
    private function total_license_use($id)
    {
        $company_id = DB::table('licenses')->select('licencia_restante')->where('id', '=', $id)->get();
        foreach ($company_id as $id_company) {
            foreach ($id_company as $id) {
                $id;
            }
        }
        return $id;
    }
}
