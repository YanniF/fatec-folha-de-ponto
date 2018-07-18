@extends('master')
@section('title', 'Impressão')

@section('content')

  <main class="prof">
    <h1>Professores - Impressão</h1>
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="pesquisar-input" class="pesquisar-input">    
      <span id="pesquisar-icon"><i class="fas fa-search"></i></span>
    </div>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Projeto</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr class="tabela-item">
          <td>Professor Pasquale</td>
          <td>Um projeto super interessante 😎</td>
          <td>
            <a href="#" class="btn btn-imprimir" title="Imprimir folha de ponto"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-gerarDoc" title="Alterar folha manualmente"><i class="far fa-file-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Professor Girafales</td>
          <td>Projeto de gestão de projetos</td>
          <td>
            <a href="#" class="btn btn-imprimir" title="Imprimir folha de ponto"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-gerarDoc" title="Alterar folha manualmente"><i class="far fa-file-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Mussum Ipsum</td>
          <td>Cacilds vidis litro abertis</td>
          <td>
            <a href="#" class="btn btn-imprimir" title="Imprimir folha de ponto"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-gerarDoc" title="Alterar folha manualmente"><i class="far fa-file-alt"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
  </main>

@endsection
