<?php

namespace App\Http\Controllers\FunctionalityControllers;


use App\Http\Controllers\Controller;
use App\Models\ItemImport;
use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\piece;
use Excel;

class ImportatorController extends Controller
{
  public function index()
  {
      $lots = Lot::whereHas('affaire', function ($query) {
        $query->where('archived', '=', 0);
      })->orderBy('id_affaire')->orderBy('ref_lot')->get();
      return view('functionalities/importator',compact('lots'));
  }

  public function downloadExcel(Request $request, $type)
	{
		$data = ItemImport::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){

			$path = $request->file('import_file')->getRealPath();
      $idLot = $request->input('id_lot');
			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {

              $weightCalculated = $value['poids_tot']/$value['quantity'];

              $piece = Piece::updateOrCreate(['id_lot' => $idLot
              ,'ref_piece' => $value['rep_re']]
              , ['profil' => $value['profil']
              , 'quantity' => $value['quantity']
              , 'length' => $value['longueur']
              , 'surface' => $value['surface']
              , 'unit_weight' => $weightCalculated
              , 'designation' => $value['designation']]);

				}


				if(!empty($insert)){
					return back()->with('success','Insert Record successfully.');
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}


  public function exportPDF()
  {
    $data = Piece::get()->toArray();
    return Excel::create('itsolutionstuff_example',function($excel) use ($data)
    {
      $excel->sheet('mySheet', function($sheet) use ($data)
      {
        $sheet->fromArray($data);
      });
    })->download("pdf");
  }
}
