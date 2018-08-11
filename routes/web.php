<?php

Route::get('/', function () {
    return view('home');
});

Route::get('prof/impressao', 'ProfessorController@print');

Route::resource('prof', 'ProfessorController');
// Route::resource('adm', 'AdministrativoController');
// Route::resource('feriado', 'FeriadoController');

// Administrativos
Route::get('adm', 'AdministrativoController@index');
Route::post('adm/cadastrar', 'AdministrativoController@cadastrar');
Route::get('adm/exibir/{id}', 'AdministrativoController@exibir');
Route::post('adm/editar/{id}', 'AdministrativoController@editar');
Route::get('adm/excluir/{id}', 'AdministrativoController@excluir');

Route::get('adm/impressao', 'AdministrativoController@print');

// Feriado
Route::get('feriado', 'FeriadoController@index');
Route::post('feriado/cadastrar', 'FeriadoController@cadastrar');
Route::get('feriado/exibir/{id}', 'FeriadoController@exibir');
Route::post('feriado/editar/{id}', 'FeriadoController@editar');
Route::get('feriado/excluir/{id}', 'FeriadoController@excluir');

