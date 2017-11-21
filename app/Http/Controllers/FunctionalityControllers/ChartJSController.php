<?php

namespace App\Http\Controllers\FunctionalityControllers;


use App\Http\Controllers\Controller;

use App\Models\Lot;
use App\Models\Affaire;
use Illuminate\Http\Request;

class ChartJSController extends Controller
{
    public function chartjs()
    {
      $affaires=Affaire::where('archived',0)->get();
      $compteur=0;
      foreach ($affaires as $affaire) {

      //
      // $lots = Lot::whereHas('affaire', function ($query) {
      //   $query->where('archived', '=', 0);
      // })->orderBy('id_affaire')->orderBy('ref_lot')->get();

      // dd($lots->id_affaire);

      foreach($affaire->lot as $lot) {

        $barOptions_stacked ='barOptions_stacked';
        $color = 120*$lot->id;

        $datasets[$compteur][] =
          [
            'label' => $lot->affaire->ref_affaire.'-'.$lot->ref_lot,
            // "backgroundColor" => "rgba(38,185,154,$color)",
            // "borderColor" => "rgba(38,185,154,0.7)",
            // "pointBorderColor" => "rgba(38,185,154,0.7)",
            // "pointBackgroundColor" => "rgba(38,185,154,0.7)",
            // "pointHoverColor" => "#fff",
            // "pointHoverBorderColor" => "rgba(220,220,220,1)",
            // "data" => [65,59,80,81,56,55,40],
            'backgroundColor' => ["rgba(0, $color, $color, 0.5)",
                                  "rgba(0, $color, $color, 0.5)",
                                  "rgba(0, $color, $color, 0.5)",
                                  "rgba(0, $color, $color, 0.5)",
                                  "rgba(0, $color, $color, 0.5)",
                                  "rgba(0, $color, $color, 0.5)" ],
            'data' => [$lot->manufactured_weight,
                      $lot->painted_weight,
                      $lot->sent_selled_weight,
                      $lot->sent_weight,
                      $lot->mounted_weight,
                      $lot->theorical_weight
                    ]
          ];

        }

          $chartjs_s[] = app()->chartjs
              ->name('test'.$compteur)
              ->type('horizontalBar')
              ->size(['width'=>400,'height'=>200])
              ->labels(['Fabriqué','Peint','Envoyé Vendu','Envoyé','Monté','Poids Théorique Total'])
              ->datasets($datasets[$compteur])
              ->options([]);

              $compteur +=1 ;

          }

    return view('functionalities/chartjs',compact('chartjs_s'));
  }
}
