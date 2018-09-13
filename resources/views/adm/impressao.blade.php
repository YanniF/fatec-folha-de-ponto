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
            <a href="#" class="btn btn-imprimir" title="Imprimir folha de ponto" data-id="{{$a->id}}" onclick="mostrarModal()"><i class="fas fa-print"></i></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
    <a href="#" id="btnMostrarModal" class="btn btn-imprimir-tudo" data-id="0" title="Imprimir tudo"><i class="fas fa-print"></i></a>
  </main>
@endsection

@section('modal')
<div class="modal-wrapper modal-impressao" id="modal-wrapper">
  <div class="modal">
    <div class="modal-header">
      <h3>Imprimir</h3>
      <a href="#" class="btn-fechar">&times;</a>   
    </div>
    <div class="modal-body">
    
      <div class="form-group">
        <label for="mes">Mês</label>
        <select name="mes" id="mes" class="modal-select">
          <option value="01">Janeiro</option>
          <option value="02">Fevereiro</option>
          <option value="03">Março</option>
          <option value="04">Abril</option>
          <option value="05">Maio</option>
          <option value="06">Junho</option>
          <option value="07">Julho</option>
          <option value="08">Agosto</option>
          <option value="09">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
        </select>
      </div>         
      <div class="form-group">
        <label for="ano">Ano</label>
        <select name="ano" id="ano" class="modal-select">
          <option value="{{Carbon\Carbon::now()->year}}">{{Carbon\Carbon::now()->year}}</option>
          <option value="{{Carbon\Carbon::now()->addYear()->year}}">{{Carbon\Carbon::now()->addYear()->year}}</option>
        </select>
      </div>
      <div class="form-group">
        <a href="#" class="btn btn-modal" id="irImpressao">Imprimir</a>
        <input type="button" value="Cancelar" class="btn btn-modal" onclick="esconderModal()">
      </div>
    </div>
  </div>
</div>
@endsection