@extends('master')
@section('title', 'Feriado')

@section('content')

  <main class="feriado">
    <h1>Feriados</h1>
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="pesquisar-input" class="pesquisar-input">    
      <span id="pesquisar-icon"><i class="fas fa-search"></i></span>
    </div>
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
        <tr class="tabela-item">
          <td>Aniversário da Yanni</td>
          <td>30/11/2018</td>
          <td>Sem expediente</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar feriado"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar feriado"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Véspera de Natal</td>
          <td>24/12/2018</td>
          <td>Sem expediente</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar feriado"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar feriado"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Natal</td>
          <td>25/12/2018</td>
          <td>Feriado</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar feriado"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar feriado"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
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
        <h3>Cadastro</h3>
        <a href="#" class="btn-fechar">&times;</a href="#">   
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Feriado" class="modal-input" required autofocus>
          </div>
          <div class="form-group">
            <label for="dia">Data</label>
            <div class="modal-data">
              <select name="dia" id="dia" class="modal-select">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
              </select>
              <select name="mes" id="mes" class="modal-select"> 
                <option value="0">Janeiro</option>
                <option value="1">Fevereiro</option>
                <option value="2">Março</option>
                <option value="3">Abril</option>
                <option value="4">Maio</option>
              </select>
              <select name="ano" id="ano" class="modal-select">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
              </select>
            </div>
          </div>            
          <div class="form-group">
            <label for="info">Informação</label>
            <select name="info" id="info" class="modal-select modal-select-info">
              <option value="dia">Feriado</option>
              <option value="dia">Sem expediente</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Cadastrar" class="btn btn-modal">
            <input type="reset" value="Limpar" class="btn btn-modal">
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

