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

Route::middleware(['ownerMiddleware'])->group(function () {

    //users
    Route::get('/zaposleni', 'adminController@usersIndex');
    Route::get('/uredi-zaposleni/{userID}', 'adminController@editUserIndex');
    Route::post('/editUserExe', 'adminController@editUserExe');

    Route::get('getDescription', 'adminController@getDescription');


    //drinks
    Route::get('/pijace', 'drinksController@index');
    Route::get('/uredi-pijaco/{drinkID}', 'drinksController@editDrink');
    Route::get('/izbrisi-pijaco/{drinkID}', 'drinksController@deleteDrink');
    Route::post('/uredi-pijaco-exe', 'drinksController@editDrinkExe');
    Route::get('/dodaj-pijaco', 'drinksController@newDrink');
    Route::post('/dodaj-pijaco-exe', 'drinksController@newDrinkExe');


    //stocktakings
    Route::get('/ogled-popisa/{stocktakingID}', 'archiveController@inspectStocktaking');

    Route::get('/tiskaj-popis/{stocktakingID}', 'archiveController@printStocktaking');
    Route::get('/primerjaj-popis/{stocktakingID}', 'archiveController@compareStocktaking');
    Route::post('/primerjaj-popis-exe', 'archiveController@compareStocktakingExe');

});


Route::middleware(['bartenderMiddleware'])->group(function () {

    //CREATE STOCKTAKING
    Route::get('/zacni-popis', 'inventoryController@createStocktaking');

    //ACTIVE STOCKTAKING
    Route::get('/aktivni-popis', 'inventoryController@index');
    Route::get('/active-stocktaking-search/{query}', 'inventoryController@searchActiveStocktaking');

    Route::get('/add-quantity/{drinkID}/{quantity}', 'inventoryController@addQuantity');
    Route::get('/add-weight/{drinkID}/{weight}', 'inventoryController@addWeight');

    //COUNTED STOCKTAKING
    Route::get('/prestete-pijace', 'inventoryController@countedStocktaking');
    Route::get('/counted-stocktaking-search/{query}', 'inventoryController@searchCountedStocktaking');

    Route::get('/additional-add-quantity/{drinkID}/{quantity}', 'inventoryController@additionalAddQuantity');
    Route::get('/additional-add-weight/{drinkID}/{weight}', 'inventoryController@additionalAddWeight');

    //COMPLETE STOCKTAKING
    Route::get('/oddaj-popis', 'inventoryController@completeStocktakingCheck');
    Route::get('/potrdi-popis', 'inventoryController@confirmStocktaking');
});


//ARCHIVE STOCKTAKINGS
Route::get('/arhiv-popisov', 'archiveController@stocktakingIndex');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//global
Route::get('/odjava', 'basicController@odjava');


//meni
Route::get('/meni', 'menuController@privateIndex');
Route::get('/', 'menuController@publicIndex');

Route::get('/dogodek/{eventID}', 'eventsController@guestDisplayEvent');

//events
Route::get('/dogodki', 'eventsController@index');
Route::get('/dodaj-dogodek', 'eventsController@addEvent');
Route::post('/dodaj-dogodek-exe', 'eventsController@addEventExe');
Route::get('/izbrisi-dogodek/{eventID}', 'eventsController@deleteEvent');
Route::get('/uredi-dogodek/{eventID}', 'eventsController@editEventIndex');
Route::post('/uredi-dogodek-exe', 'eventsController@editEventExe');


//tournaments
Route::get('/turniri', 'tournamentController@index');
Route::get('/dodaj-turnir', 'tournamentController@new');
Route::post('/dodaj-turnir-exe', 'tournamentController@newExe');
Route::get('/turnir/{tournamentID}', 'tournamentController@singleTournament');


//teams
Route::get('/prijava-ekipe/{tournamentID}', 'teamController@newTeam');
Route::post('/prijavi-ekipi-exe', 'teamController@newTeamExe');

Route::get('/odjavi-ekipo/{teamID}', 'teamController@deleteTeam');
Route::get('/zakljuci-prijave/{tournamentID}', 'tournamentController@closeApplication');



Route::get('/{drinkCategoryID}', 'menuController@getMenuDrinks');

Route::get('/uredi-meni/{categoryID}', 'menuController@editMenu');
Route::get('/spremeni-pozicijo/{direction}/{drinkID}/{categoryID}', 'menuController@changePosition');



Route::get('/blez', 'testController@blez');




//popisi





Route::get('/error-page', 'basicController@errorPage');
