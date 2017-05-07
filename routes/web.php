<?php
use App\Http\Controllers\ColisController;
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

Route::resource('affaire','AffaireController');
Route::resource('lot','LotController');
Route::resource('piece','PieceController');
Route::resource('colis','ColisController',['parameters' => [
  'colis' => 'colis'
  ]]);
Route::resource('b_l','BLController');
Route::resource('adresse','AdresseController');



Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


/*
Route::group(['prefix'=>'admin','middleware'=>'ip'],function () {
  Route::get('/', function () {
      return View::view('welcome');
  });
});*/
