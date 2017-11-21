<?php
//use App\Http\Controllers\ModelControllers\ColisController;
use Illuminate\Contracts\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// MODELS RESSOURCES ROUTES

Route::resource('affaire','ModelControllers\AffaireController');
Route::resource('lot','ModelControllers\LotController');
//Route::resource('affaire.piece','PieceController',['parameters'=>'singular','names' => 'piece']);
Route::resource('piece','ModelControllers\PieceController');
Route::get('colis/{colis}/state', 'ModelControllers\ColisController@state')->name('colis.state');
Route::resource('colis','ModelControllers\ColisController',['parameters' => ['colis' => 'colis']]);
Route::resource('b_l','ModelControllers\BLController');
Route::resource('adresse','ModelControllers\AdresseController');
Route::resource('user','ModelControllers\UserController');

// IMPORTATOR


Route::get('importator','FunctionalityControllers\ImportatorController@index')->name('importator');
Route::get('downloadExcel/{type}','FunctionalityControllers\ImportatorController@downloadExcel');
Route::post('importExcel','FunctionalityControllers\ImportatorController@importExcel')->name('importExcel');
Route::get('exportPDF','FunctionalityControllers\ImportatorController@exportPDF')->name('exportPDF');

//SearchBar
Route::get('searchBar','FunctionalityControllers\SearchBarController@results')->name('searchbar');

// HOME //


Route::get('/chartjs', 'FunctionalityControllers\ChartJSController@chartjs')->name('chartjs');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


/*
Route::group(['prefix'=>'admin','middleware'=>'ip'],function () {
  Route::get('/', function () {
      return View::view('welcome');
  });
});*/
