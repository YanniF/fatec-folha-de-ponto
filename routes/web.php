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

Route::get('adm/impressao', 'AdministrativoController@impressao');
Route::get('adm/imprimirtudo/{mes}/{ano}', 'AdministrativoController@imprimirTudo');
Route::get('adm/imprimir/{mes}/{ano}/{id}', 'AdministrativoController@imprimir');

// Professores
Route::get('prof', 'ProfessorController@index');
Route::post('prof/cadastrar', 'ProfessorController@cadastrar');
Route::get('prof/exibir/{id}', 'ProfessorController@exibir');
Route::post('prof/editar/{id}', 'ProfessorController@editar');
Route::get('prof/excluir/{id}', 'ProfessorController@excluir');

Route::get('prof/impressao', 'ProfessorController@impressao');
Route::get('prof/imprimirtudo/{mes}/{ano}', 'ProfessorController@imprimirTudo');
Route::get('prof/imprimir/{mes}/{ano}/{id}', 'ProfessorController@imprimir');

// Feriado
Route::get('feriado', 'FeriadoController@index');
Route::post('feriado/cadastrar', 'FeriadoController@cadastrar');
Route::get('feriado/exibir/{id}', 'FeriadoController@exibir');
Route::post('feriado/editar/{id}', 'FeriadoController@editar');
Route::get('feriado/excluir/{id}', 'FeriadoController@excluir');
