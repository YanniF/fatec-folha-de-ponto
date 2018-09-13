@extends('master')
@section('title', 'Professor')

@section('content')
  <main class="prof">
    <h1>Professores</h1>
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="pesquisar-input" class="pesquisar-input">    
      <span id="pesquisar-icon"><i class="fas fa-search"></i></span>
    </div>
    @if(old('nome'))
    <div class="alerta alerta-sucesso"><p><i class="fas fa-check"></i> Informações salvas</p></div>
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
          <th>Projeto</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      @foreach($profs as $p)
        <tr class="tabela-item">
          <td>{{$p->nome}}</td>
          <td>{{$p->projeto}}</td>
          <td>
            <a href="/prof/exibir/{{$p->id}}" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar funcionário" data-id="{{ $p->id}}"><i class="fas fa-trash-alt"></i></a>
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
        <h3>{{ isset($prof) ? 'Editar' : 'Cadastrar' }}</h3>
        <a href="#" class="btn-fechar">&times;</a>   
      </div>
      <div class="modal-body">
      @if(isset($prof))
        <form method="post" action="/prof/editar/{{$prof->id}}">
      @else
        <form method="post" action="/prof/cadastrar">
      @endif
        @csrf
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome" class="modal-input" value="{{ isset($prof) ? $prof->nome : '' }}" required>
          </div>
          <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" placeholder="Categoria" class="modal-input" value="{{ isset($prof) ? $prof->categoria : '' }}" required>
          </div>
          <div class="form-group">
            <label for="projeto">Projeto</label>
            <input type="text" name="projeto" id="projeto" placeholder="Projeto" class="modal-input" value="{{ isset($prof) ? $prof->projeto : '' }}" required>
          </div> 
          <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" name="funcao" id="funcao" placeholder="Função" class="modal-input" value="{{ isset($prof) ? $prof->funcao : '' }}" required>
          </div> 
          <div class="form-group">
            <label for="curso">Curso</label>
            <input type="text" name="curso" id="curso" placeholder="Curso" class="modal-input" value="{{ isset($prof) ? $prof->curso : '' }}" required>
          </div> 
          <div class="form-group">
            <label for="carga">Carga </label>
            <input type="number" name="carga" id="carga" placeholder="Carga horária" class="modal-input" min="0" value="{{ isset($prof) ? $prof->carga : '' }}" required>
          </div>
          <div class="form-group">
            <table>
              <thead>
                <th>Dia</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th><button id="btnAddLinha" class="btn btn-add" title="Adicionar novo horário"><i class="fas fa-plus"></i></button></th>
              </thead>
              <tbody id="horario">
              @if(isset($prof))
                @for($i = 0; $i < count($prof->dia); $i++)
                <tr>
                  <td>                  
                    <select name="dia[]" id="dia" class="modal-select">
                      <option value="Seg" {{$prof->dia[$i] == 'Seg' ? 'selected' : ''}}>Seg</option>
                      <option value="Ter" {{$prof->dia[$i] == 'Ter' ? 'selected' : ''}}>Ter</option>
                      <option value="Qua" {{$prof->dia[$i] == 'Qua' ? 'selected' : ''}}>Qua</option>
                      <option value="Qui" {{$prof->dia[$i] == 'Qui' ? 'selected' : ''}}>Qui</option>
                      <option value="Sex" {{$prof->dia[$i] == 'Sex' ? 'selected' : ''}}>Sex</option>
                      <option value="Sab" {{$prof->dia[$i] == 'Sab' ? 'selected' : ''}}>Sab</option>
                    </select>
                  </td>
                  <td>
                    <input type="time" class="modal-input" name="entrada[]" value="{{$prof->entrada[$i]}}" required>
                  </td>
                  <td>
                    <input type="time" class="modal-input" name="saida[]" value="{{$prof->saida[$i]}}" required>
                  </td>
                  <td>
                    <a href="#" class="btn btn-apagar delete" title="Apagar horário"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                @endfor
                @else
                <tr>
                  <td>                  
                    <select name="dia[]" id="dia" class="modal-select">
                      <option value="Seg">Seg</option>
                      <option value="Ter">Ter</option>
                      <option value="Qua">Qua</option>
                      <option value="Qui">Qui</option>
                      <option value="Sex">Sex</option>
                      <option value="Sab">Sab</option>
                    </select>
                  </td>
                  <td>
                    <input type="time" class="modal-input" name="entrada[]" required>
                  </td>
                  <td>
                    <input type="time" class="modal-input" name="saida[]" required>
                  </td>
                  <td>
                    <a href="#" class="btn btn-apagar delete" title="Apagar horário"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              @endif
              </tbody>
            </table>
          </div>
          <div class="form-group">
          <input type="submit" value="{{ isset($prof) ? 'Salvar' : 'Cadastrar' }}" class="btn btn-modal">
          @if(isset($prof))
            <input type="button" value="Cancelar" class="btn btn-modal" onclick="esconderModal()">
          @else
            <input type="reset" value="Limpar" class="btn btn-modal">
          @endif 
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal-wrapper modal-apagar" id="modal-wrapper2">
    <div class="modal">
      <div class="modal-header">
        <h3>Apagar</h3>
        <a href="#" class="btn-fechar">&times;</a>   
      </div>
      <div class="modal-body">
        <p class="mensagem">Deseja apagar as informações deste professor?</p>      
        <div class="form-group">
          <a href="#" class="btn btn-modal" id="btnApagar">Apagar</a>
          <input type="button" value="Cancelar" class="btn btn-modal" onclick="esconderModalApagar()">
        </div>
      </div>
    </div>
  </div>
@endsection