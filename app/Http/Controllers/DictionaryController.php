<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class DictionaryController extends Controller
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
    public function Dictionary()
    {
        $id_company= \Auth::user()->company_id;
        $dictionaries = DB::select("SELECT * FROM dictionary WHERE company_id=?",[$id_company]);
        $dictionaries = Dictionary::orderBy('nombre','Asc')->paginate(5);
        return view('plantillas.dictionary',compact('id_company','dictionaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDictionary(UserRequest $request)
    {
        //$request->all llama a todos los campos del formulario para ser insertados
        //save() guarda el registro
        $dictionary = new Dictionary;
        $dictionary->nombre = ".".$request->extension;
        $dictionary->company_id = $request->company_id;
        $dictionary->save();
        return back()->with('dictionary' ,'Data inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function show(Dictionary $dictionary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function destroyDictionary($id)
    {
        $dictionary = Dictionary::find($id);
        $dictionary->delete();

        return back()->with('dictionary_destroy' ,'Data deleted Successfully');
    }
}
