<?php

namespace App\Http\Controllers;

use App\Models\BL;
use App\Models\Adresse;
use Illuminate\Http\Request;

class BLController extends Controller
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
      $b_ls = BL::get();
      return view('b_ls/index',compact('b_ls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idAdress = Adresse::pluck('name','id');
        return view('b_ls/create',compact('idAdress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $b_ls = new BL($request->all());
      $b_ls->save();
      return redirect()->route('b_l.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($b_l)
    {
        $b_ls = new BL;
        $b_ls = BL::find($b_l);

        $colis_s = $b_ls->colis()->get();


        return view('b_ls/show',compact('b_ls','colis_s'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($b_l)
    {
        $b_ls = new BL;
        $b_ls = BL::find($b_l);
        $idAdress = Adresse::pluck('name','id');
        return view('b_ls/edit',compact('b_ls','idAdress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($b_l, Request $request)
    {
            $b_ls = new BL;
            $b_ls = BL::find($b_l);

            $b_ls->update($request->all());
            $b_ls->save;

            return redirect()->route('b_l.edit', [$b_ls]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($b_l)
    {
        BL::destroy($b_l);

        return redirect()->route('b_l.index');
    }
}
