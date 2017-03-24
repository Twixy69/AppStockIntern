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

Route::resource('piece','PiecesController');

Route::group(['prefix'=>'admin','middleware'=>'ip'],function () {
  Route::get('/', function () {
      return View::view('welcome');
  });
});

Route::get('/', 'HomeController@index');
