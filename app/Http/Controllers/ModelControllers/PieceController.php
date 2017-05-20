<?php

namespace App\Http\Controllers\ModelControllers;


use App\Http\Controllers\Controller;

use App\Models\Piece;
use App\Models\Lot;
use Illuminate\Http\Request;

class PieceController extends Controller
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
      return view('models/pieces/index',compact('pieces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idLot = Lot::pluck('id_affaire','id');
        return view('models/pieces/create',compact('idLot'));
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
        return view('models/pieces/show',compact('pieces'));
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
        $idLot = Lot::pluck('id_affaire','id');
        return view('models/pieces/edit',compact('pieces','idLot'));
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
