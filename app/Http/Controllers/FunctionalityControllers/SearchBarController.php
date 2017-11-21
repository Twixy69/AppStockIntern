<?php

namespace App\Http\Controllers\FunctionalityControllers;

use App\Models\BL;
use App\Models\Piece;
use App\Models\Colis;
use App\Models\Affaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchBarController extends Controller {

  public function results(Request $request)
  {
      $search = $request->input('search');

      if($search != null ){
        $b_ls = BL::where('ref_b_l','like','%'.$search.'%')
          ->orderBy('ref_b_l')->get();
        $pieces = Piece::where('ref_piece','like','%'.$search.'%')
            ->orderBy('ref_piece')->get();
        $colis_s = Colis::where('number','like','%'.$search.'%')
               ->orderBy('number')->get();
      }

      $request->flashOnly('search');
      return view('functionalities/searchResult',compact(['pieces','b_ls','colis_s']));
  }
}
