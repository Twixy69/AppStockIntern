<?php

namespace App\Http\Controllers\FunctionalityControllers;


use App\Http\Controllers\Controller;
use App\Models\ItemImport;
use Illuminate\Http\Request;
use Excel;

class ImportatorController extends Controller
{
  public function index()
  {
      return view('functionalities/importator');
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

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
                        $insert[]=$value;
// 						foreach ($value as $key_2 => $v) {
// //dd($key_2);
// 							// $insert[] = ['rep_re' => $v['rep_re']
//               // , 'profil' => $value['profil']
//               // , 'quantite' => $value['quantite']
//               // , 'longueur' => $value['longueur']
//               // , 'surface' => $value['surface']
//               // , 'poids_unit' => $value['poids_unit']
//               // , 'poids_tot' => $value['poids_tot']
//               // , 'designation' => $value['designation']];
//               //
//               // dd($insert);
// 						}

					}
				}


				if(!empty($insert)){
					ItemImport::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}
