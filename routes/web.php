<?php

Route::get('viagens', 'TripController@index');
Route::get('viagem/cadastrar', 'TripController@create')->name('viagem.create');
Route::post('viagem/cadastrar', 'TripController@store')->name('viagem.store');
Route::get('viagem/{id}', 'TripController@show');
Route::get('viagem/deletar/{id}', 'TripController@destroy');

Route::get('passageiros', 'PassengerController@index');
Route::get('passageiro/cadastrar/{id}', 'PassengerController@create')->name('passageiro.create');
Route::post('passageiro/cadastrar/{id}', 'PassengerController@store')->name('passageiro.store');
Route::get('passageiro/{id}', 'PassengerController@show');
Route::get('passageiro/deletar/{id}', 'PassengerController@destroy');

Route::get('relatorio/{id}', 'RecordController@show')->name('relatorio.show');


Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/', function () {
    return view('pages.login');
});
