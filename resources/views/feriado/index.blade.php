@extends('master')
@section('title', 'Feriado')

@section('content')

  <main class="feriado">
    <h1>Feriados</h1>
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="pesquisar-input" class="pesquisar-input">    
      <span id="pesquisar-icon"><i class="fas fa-search"></i></span>
    </div>
    @if(old('nome'))
    <div class="alerta alerta-sucesso"><p>Informações salvas</p></div>
    @endif
    @if ($errors->any())
      <div class="alerta alerta-erro">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <table>
      <thead>
        <tr>
          <th>Feriados</th>
          <th>Dia</th>
          <th>Informação</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      @foreach($feriados as $feriado)
        <tr class="tabela-item">
          <td>{{$feriado->nome}}</td>
          <td>{{Carbon\Carbon::parse($feriado->data)->format('d/m/Y')}}</td>
          <td>{{$feriado->informacao}}</td>
          <td>
            <a href="/feriado/exibir/{{$feriado->id}}" class="btn btn-editar" title="Editar feriado"><i class="fas fa-pencil-alt"></i></a>
            <a href="/feriado/excluir/{{$feriado->id}}" class="btn btn-apagar" title="Apagar feriado" data-nome="feriado-{{ $feriado->id }}" data-id="{{ $feriado->id}}"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr> 
      @endforeach               
      </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
    <a href="#" id="btnMostrarModal" class="btn btn-cadastrar" title="Cadastar feriado"><i class="fas fa-plus"></i></a>
  </main>

@endsection

@section('modal')

  <div class="modal-wrapper" id="modal-wrapper">
    <div class="modal">
      <div class="modal-header">
        <h3>{{ isset($f) ? 'Editar' : 'Cadastrar' }}</h3>
        <a href="#" class="btn-fechar">&times;</a href="#">   
      </div>
      <div class="modal-body">
      @if(isset($f))
        <form method="post" action="/feriado/editar/{{$f->id}}">
      @else
        <form method="post" action="/feriado/cadastrar">
      @endif
          @csrf
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Feriado" class="modal-input" value="{{ isset($f) ? $f->nome : '' }}" required autofocus>
          </div>
          <div class="form-group">
            <label for="dia">Data</label>
            <input type="date" name="data" id="data" class="modal-input" min='2018-01-01' max='2025-12-31' value="{{ isset($f) ? $f->data : '' }}">
          </div>            
          <div class="form-group">
            <label for="info">Informação</label>
            <select name="informacao" id="info" class="modal-select">
              <option value="Feriado" {{(isset($f) && $f->informacao == 'Feriado') ? 'selected' : ''}}>Feriado</option>
              <option value="Sem expediente" {{(isset($f) && $f->informacao == 'Sem expediente') ? 'selected' : ''}}>Sem expediente</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Cadastrar" class="btn btn-modal">
          @if(isset($f))
            <input type="button" value="Cancelar" class="btn btn-modal" onclick="esconderModal()">
          @else
            <input type="reset" value="Limpar" class="btn btn-modal">
          @endif 
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

