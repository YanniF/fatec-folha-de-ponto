<?php

Route::get('/', function () {
    return view('home');
});

// Administrativos
Route::get('adm', 'AdministrativoController@index');
Route::post('adm/cadastrar', 'AdministrativoController@cadastrar');
Route::get('adm/exibir/{id}', 'AdministrativoController@exibir');
Route::post('adm/editar/{id}', 'AdministrativoController@editar');
Route::get('adm/excluir/{id}', 'AdministrativoController@excluir');

// Route::get('adm/impressao', 'AdministrativoController@print');
Route::get('adm/impressao/{mes}/{ano}/{id}', 'AdministrativoController@print');

// Professores
Route::get('prof', 'ProfessorController@index');
Route::post('prof/cadastrar', 'ProfessorController@cadastrar');
Route::get('prof/exibir/{id}', 'ProfessorController@exibir');
Route::post('prof/editar/{id}', 'ProfessorController@editar');
Route::get('prof/excluir/{id}', 'ProfessorController@excluir');
Route::get('prof/impressao', 'ProfessorController@print');

// Feriado
Route::get('feriado', 'FeriadoController@index');
Route::post('feriado/cadastrar', 'FeriadoController@cadastrar');
Route::get('feriado/exibir/{id}', 'FeriadoController@exibir');
Route::post('feriado/editar/{id}', 'FeriadoController@editar');
Route::get('feriado/excluir/{id}', 'FeriadoController@excluir');