<?php


Route::group(['middleware' => ['auth']], function () {

    Route::get('viagens', 'TripController@index')->name('viagem.index');
    Route::get('viagem/cadastrar', 'TripController@create')->name('viagem.create');
    Route::post('viagem/cadastrar', 'TripController@store')->name('viagem.store');
    Route::get('viagem/{id}', 'TripController@show');
    Route::get('viagem/deletar/{id}', 'TripController@destroy')->name('viagem.delete');
    Route::get('viagem/editar/{id}', 'TripController@edit')->name('viagem.edit');
    Route::post('viagem/editar/{id}', 'TripController@update')->name('viagem.update');
    
    Route::get('passageiros', 'PassengerController@index');
    Route::get('passageiro/cadastrar/{id}', 'PassengerController@create')->name('passageiro.create');
    Route::post('passageiro/cadastrar/{id}', 'PassengerController@store')->name('passageiro.store');
    Route::get('passageiros/{id}', 'PassengerController@show')->name('passageiro.show');
    Route::get('passageiro/deletar/{id}', 'PassengerController@destroy')->name('passageiro.delete');
    Route::get('passageiro/editar/{id}', 'PassengerController@edit')->name('passageiro.edit');
    Route::post('passageiro/editar/{id}', 'PassengerController@update')->name('passageiro.update');
    
    Route::get('relatorio', 'RecordController@index')->name('relatorio.index');
    Route::get('relatorio-viagem/pdf', 'RecordController@generatePDF')->name('relatorio-viagem.pdf');
    Route::get('relatorio-passageiro/pdf/{id}', 'RecordController@generatePassengersPDF')->name('relatorio-passageiros.pdf');

    Route::get('onibus', 'BusController@index')->name('onibus.index');
    Route::post('onibus/cadastrar', 'BusController@store')->name('onibus.store');

    Route::get('motorista', 'DriverController@index')->name('motorista.index');
    Route::post('motorista/cadastrar', 'DriverController@store')->name('motorista.store');

    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/register', 'HomeController@register')->name('register');