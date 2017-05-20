<?php

namespace App\Http\Controllers\ModelControllers;


use App\Http\Controllers\Controller;
use App\Models\Colis;
use App\Models\Adresse;
use Illuminate\Http\Request;

class ColisController extends Controller
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
      $colis_s = Colis::get();
      return view('models/colis_s/index',compact('colis_s'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idAdress = Adresse::pluck('name','id');
        return view('models/colis_s/create',compact('idAdress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colis_s = new Colis($request->all());
        $colis_s->save();
        return redirect()->route('colis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function show($colis)
    {
        $colis_s = new Colis;
        $colis_s = Colis::find($colis);

        $pieces = $colis_s->pieces()->get();


        return view('models/colis_s/show',compact('colis_s','pieces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function edit($colis)
    {
        $colis_s = new Colis;
        $colis_s = Colis::find($colis);
        $idAdress = Adresse::pluck('name','id');
        return view('models/colis_s/edit',compact('colis_s','idAdress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function update($colis, Request $request)
    {
        $colis_s = new Colis;
        $colis_s = Colis::find($colis);

        $colis_s->update($request->all());
        $colis_s->save;

        return redirect()->route('colis.show', [$colis_s]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colis  $colis
     * @return \Illuminate\Http\Response
     */
    public function destroy($colis)
    {
        Colis::destroy($colis);

        return redirect()->route('colis.index');
    }
}
