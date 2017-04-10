<?php

namespace App\Http\Controllers;

use App\Models\Affaire;
use App\Models\Adresse;
use Illuminate\Http\Request;

class AffaireController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affaires = Affaire::get();
        return view('affaires/index',compact('affaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idAdress = Adresse::pluck('name','id');
        return view('affaires/create',compact('idAdress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $affaires = new Affaire($request->all());
        $affaires->save();
        return redirect()->route('affaire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function show($affaire)
    {
        $affaires = new Affaire;
        $affaires = Affaire::find($affaire);
        return view('affaires/show',compact('affaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function edit($affaire)
    {
        $affaires = new Affaire;
        $affaires = Affaire::find($affaire);
        $idAdress = Adresse::pluck('name','id');
        return view('affaires/edit',compact('affaires','idAdress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function update($affaire, Request $request)
    {
          $affaires = new Affaire;
          $affaires = Affaire::find($affaire);

          $affaires->update($request->all());
          $affaires->save;

          return redirect()->route('$affaire.edit', [$affaires]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($affaire)
    {
        Affaire::destroy($affaire);

        return redirect()->route('affaire.index');
    }
}
