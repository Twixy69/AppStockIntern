<?php

namespace App\Http\Controllers\ModelControllers;


use App\Http\Controllers\Controller;
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
      return view('models/b_ls/index',compact('b_ls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idAdress = Adresse::pluck('name','id');
        return view('models/b_ls/create',compact('idAdress'));
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
    public function show($id)
    {
        $b_l = BL::find($id);

        $colis_s = $b_l->colis()->get();


        return view('models/b_ls/show',compact('b_l','colis_s'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $b_ls = new BL;
        $b_ls = BL::find($id);
        $idAdress = Adresse::pluck('name','id');
        return view('models/b_ls/edit',compact('b_ls','idAdress'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
            $b_l = BL::find($id);

            $b_l->update($request->all());
            $b_l->save;

            return redirect()->route('b_l.edit', [$b_l]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BL::destroy($id);

        return redirect()->route('b_l.index');
    }
}
