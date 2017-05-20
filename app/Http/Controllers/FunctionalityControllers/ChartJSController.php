<?php

namespace App\Http\Controllers\FunctionalityControllers;


use App\Http\Controllers\Controller;

use App\Models\Lot;
use Illuminate\Http\Request;

class ChartJSController extends Controller
{
    public function chartjs()
    {

      $lots = Lot::get();

      foreach($lots as $lot) {

        $barOptions_stacked ='barOptions_stacked';
        $color = 120*$lot->id;

        $datasets[] =
          [
            'label' => $lot->id,
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


    $chartjs = app()->chartjs
              ->name('barChartTest')
              ->type('horizontalBar')
              ->size(['width'=>400,'height'=>200])
              ->labels(['Fabriqué','Peint','Envoyé','Envoyé','EnvoyéVendu','Monté'])
              ->datasets($datasets)
              ->options([]);

    return view('functionalities/chartjs',compact('chartjs'));
  }
}
