<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\Affaire;
use Illuminate\Http\Request;

class PiecesController extends Controller
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
      $pieces = Piece::get();
      return view('pieces.index',compact('pieces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idAffaire = Affaire::pluck('ref_affaire','id');
        return view('pieces.create',compact('idAffaire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pieces = new Piece($request->all());
        $pieces->save();
        return redirect()->route('piece.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piece  $pieces
     * @return \Illuminate\Http\Response
     */
    public function show($piece)
    {
        $pieces = new Piece;
        $pieces = Piece::find($piece);
        return view('pieces/show',compact('pieces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piece  $pieces
     * @return \Illuminate\Http\Response
     */
    public function edit($piece)
    {
        $pieces = new Piece;
        $pieces = Piece::find($piece);
        $idAffaire = Affaire::pluck('ref_affaire','id');
        return view('pieces/edit',compact('pieces','idAffaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piece  $pieces
     * @return \Illuminate\Http\Response
     */
    public function update($piece, Request $request)
    {

        $pieces = new Piece;
        $pieces = Piece::find($piece);

        $pieces->update($request->except('id_piece'));
        $pieces->save;

        return redirect()->route('piece.edit', [$pieces]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piece  $pieces
     * @return \Illuminate\Http\Response
     */
    public function destroy($piece)
    {
        Piece::destroy($piece);

        return redirect()->route('piece.index');
    }
}
