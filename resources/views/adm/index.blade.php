@extends('master')
@section('title', 'Administrativos')

@section('content')
  <main class="adm">
    <h1>Administrativos</h1>
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="pesquisar-input" class="pesquisar-input">    
      <span id="pesquisar-icon"><i class="fas fa-search"></i></span>
    </div>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Cargo</th>
          <th>Departamento</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr class="tabela-item">
          <td>Yanni Fraga</td>
          <td>Auxiliar decente 😎</td>
          <td>DTI</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar funcionário"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>André Ceratti</td>
          <td>Estagiário eterno</td>
          <td>DTI</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar funcionário"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Maria Teresa</td>
          <td>Moça do RH</td>
          <td>DP</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar funcionário"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
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
        <h3>Cadastro</h3>
        <a href="#" class="btn-fechar">&times;</a href="#">   
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome" class="modal-input" required>
          </div>
          <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" name="rg" id="rg" placeholder="RG" class="modal-input" required>
          </div>
          <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="cargo" placeholder="Cargo/Função" class="modal-input" required>
          </div> 
          <div class="form-group">
            <label for="jornada">Jornada</label>
            <input type="text" name="jornada" id="jornada" placeholder="Jornada de trabalho" class="modal-input" required>
          </div> 
          <div class="form-group">
            <label for="horario">Horário</label>
            <input type="text" name="horario" id="horario" placeholder="Horário de trabalho" class="modal-input" required>
          </div> 
          <div class="form-group">
            <label for="intervalo">Intervalo</label>
            <input type="text" name="intervalo" id="intervalo" placeholder="Intervalo de almoço e descanso" class="modal-input" required>
          </div>
          <div class="form-group checkbox">
            <input type="checkbox" name="plantao" id="plantao" value="plantao">
            <label for="plantao">Plantão</label>
            <input type="checkbox" name="estudante" id="estudante" value="estudante">
            <label for="estudante">Estudante</label>
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