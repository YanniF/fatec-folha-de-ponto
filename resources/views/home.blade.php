@extends('master')
@section('title', 'Home')

@section('content')
  <main class="home">
    <h1>Folha de Ponto</h1>
    <div class="colunas">
    <section class="adm-home">
      <h2>Administrativos</h2>
      <a href="{{ action('AdministrativoController@index') }}" class="btn btn-home" title="Cadastre ou edite funcionários"><i class="fas fa-user"></i> Cadastro</a>
      <a href="{{ action('AdministrativoController@impressao') }}" class="btn btn-home" title="Folha de ponto dos funcionários"><i class="fas fa-print"></i> Impressão</a>
    </section>
    <section class="prof-home">
      <h2>Professores</h2>
      <a href="{{ action('ProfessorController@index') }}" class="btn btn-home" title="Cadastre ou edite professores"><i class="fas fa-user"></i> Cadastro</a>
      <a href="{{ action('ProfessorController@print') }}" class="btn btn-home" title="Folha de ponto dos professores"><i class="fas fa-print"></i> Impressão</a>
    </section>
    </div>      
    <section class="feriado-home">
    <a href="{{ action('FeriadoController@index') }}" class="btn btn-home" title="Cadastre ou edite feriados"><i class="far fa-sun"></i> Feriado</a>
    </section>
  </main>
@endsection
