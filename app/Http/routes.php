<?php

use App\Studio;
use Illuminate\Http\Request;

Route::get('/', 'ReservationController@index');
/*
|--------------------------------------------------------------------------
| Studio Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/studio', 'StudioController@index');
Route::post('/studio', 'StudioController@store');
Route::get('/studio/add', function () { return view('studios.add'); });
Route::post('/studio/reserve/{studio}', 'StudioController@reserve');
Route::get('/studio/{studio}', 'StudioController@details');
Route::post('/studio/{studio}', 'StudioController@edit');
Route::get('/studio/edit/{studio}', function(Studio $studio){ return view ('studios.edit', ['studio' => $studio]); });
Route::get('/studio/delete/{studio}', function(Studio $studio){ return view ('studios.delete', ['studio' => $studio]) ;} );
Route::delete('/studio/{studio}', 'StudioController@destroy');


/*
|--------------------------------------------------------------------------
| Reservation Routes
|--------------------------------------------------------------------------
|
*/

