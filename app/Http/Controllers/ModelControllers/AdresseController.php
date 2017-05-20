<?php

namespace App\Http\Controllers\ModelControllers;


use App\Http\Controllers\Controller;
use App\Models\Adresse;
use Illuminate\Http\Request;

class AdresseController extends Controller
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
        $adresses = Adresse::get();
        return view('models/adresses/index',compact('adresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models/adresses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adresses = new Adresse($request->except(['updated_at','created_at']));
        $adresses->save(['timestamps' => false]);
        return redirect()->route('adresse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($adresse)
    {
        $adresses = new Adresse;
        $adresses = Adresse::find($adresse);
        return view('models/adresses/show',compact('adresses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($adresse)
    {
        $adresses = new Adresse;
        $adresses = Adresse::find($adresse);
        return view('models/adresses/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adresse)
    {
        $adresses = new Adresse;
        $adresses = Adresse::find($adresse);

        $adresses->update($request->except(['updated_at']));
        $adresses->save;

        return redirect()->route('adresse.edit', [$adresses]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adresse)
    {
        Adresse::destroy($adresse);

        return redirect()->route('adresse.index');
    }
}
