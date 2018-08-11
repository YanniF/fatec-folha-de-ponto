@extends('master')
@section('title', 'Administrativos')

@section('content')
  <main class="adm">
    <h1>Administrativos</h1>
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
            <a href="/adm/exibir/{{$a->id}}" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="/adm/excluir/{{$a->id}}" class="btn btn-apagar" title="Apagar funcionário" data-nome="adm-{{ $a->id }}" data-id="{{ $a->id}}"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
    <a href="#" id="btnMostrarModal" class="btn btn-cadastrar" title="Cadastar funcionário"><i class="fas fa-plus"></i></a>
  </main>
@endsection

@section('modal')
  <div class="modal-wrapper" id="modal-wrapper">
    <div class="modal">
      <div class="modal-header">
        <h3>{{ isset($adm) ? 'Editar' : 'Cadastrar' }}</h3>
        <a href="#" class="btn-fechar">&times;</a href="#">   
      </div>
      <div class="modal-body">
      @if(isset($adm))
      <form method="post" action="/adm/editar/{{$adm->id}}">
      @else
        <form method="post" action="/adm/cadastrar">
      @endif
          @csrf
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome" class="modal-input" value="{{ isset($adm) ? $adm->nome : '' }}" required>
          </div>
          <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" name="rg" id="rg" placeholder="RG" class="modal-input" value="{{ isset($adm) ? $adm->rg : '' }}" required>
          </div>
          <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="cargo" placeholder="Cargo/Função" class="modal-input" value="{{ isset($adm) ? $adm->cargo : '' }}" required>
          </div> 
          <div class="form-group">
            <label for="jornada">Jornada</label>
            <input type="text" name="jornada" id="jornada" placeholder="Jornada de trabalho" class="modal-input" value="{{ isset($adm) ? $adm->jornada : '' }}" required>
          </div> 
          <div class="form-group">
            <label for="horario">Horário</label>
            <input type="text" name="horario" id="horario" placeholder="Horário de trabalho" class="modal-input" value="{{ isset($adm) ? $adm->horario : '' }}" required>
          </div> 
          <div class="form-group">
            <label for="intervalo">Intervalo</label>
            <input type="text" name="intervalo" id="intervalo" placeholder="Intervalo de almoço e descanso" class="modal-input" value="{{ isset($adm) ? $adm->intervalo : '' }}" required>
          </div>
          <div class="form-group checkbox">
            <input type="checkbox" name="plantao" id="plantao" {{(isset($adm) && $adm->plantao == true) ? 'checked' : ''}}>
            <label for="plantao">Plantão</label>
            <input type="checkbox" name="estudante" id="estudante" {{(isset($adm) && $adm->estudante == true) ? 'checked' : ''}}>
            <label for="estudante">Estudante</label>
          </div> 
          <div class="form-group">
            <input type="submit" value="{{ isset($adm) ? 'Salvar' : 'Cadastrar' }}" class="btn btn-modal">
            @if(isset($adm))
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