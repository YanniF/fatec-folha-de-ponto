@extends('master')
@section('title', 'Impressão')

@section('content')
  <main class="adm">
    <h1>Administrativos - Impressão</h1>
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="pesquisar-input" class="pesquisar-input">    
      <span id="pesquisar-icon"><i class="fas fa-search"></i></span>
    </div>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Cargo</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      @foreach($adms as $a)
        <tr class="tabela-item">
          <td>{{$a->nome}}</td>
          <td>{{$a->cargo}}</td>
          <td>
            <a href="#" class="btn btn-imprimir" title="Imprimir folha de ponto"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-gerarDoc" title="Alterar folha manualmente"><i class="far fa-file-alt"></i></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
  </main>
@endsection
