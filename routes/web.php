<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





//meni
Route::get('/meni', 'menuController@privateIndex');
Route::get('/', 'menuController@publicIndex');

Route::get('/uredi-meni/{categoryID}', 'menuController@editMenu');
Route::get('/spremeni-pozicijo/{direction}/{drinkID}/{categoryID}', 'menuController@changePosition');


//users
Route::get('/zaposleni', 'adminController@usersIndex');
Route::get('/uredi-zaposleni/{userID}', 'adminController@editUserIndex');
Route::post('/editUserExe', 'adminController@editUserExe');


//drinks
Route::get('/pijace', 'drinksController@index');
Route::get('/uredi-pijaco/{drinkID}', 'drinksController@editDrink');
Route::get('/izbrisi-pijaco/{drinkID}', 'drinkController@deleteDrink');
Route::post('/uredi-pijaco-exe', 'drinksController@editDrinkExe');
Route::get('/dodaj-pijaco', 'drinksController@newDrink');
Route::post('/dodaj-pijaco-exe', 'drinksController@newDrinkExe');

//popisi
Route::get('/aktivni-popis', 'inventoryController@index');

Route::get('/zacni-popis', 'inventoryController@createStocktaking');


Route::get('/error-page', 'basicController@errorPage');
