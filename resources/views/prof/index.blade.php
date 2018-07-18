@extends('master')
@section('title', 'Professor')

@section('content')
  <main class="prof">
    <h1>Professores</h1>
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
            <a href="#" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar funcionário"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Professor Girafales</td>
          <td>Projeto de gestão de projetos</td>
          <td>
            <a href="#" class="btn btn-editar" title="Editar funcionário"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-apagar" title="Apagar funcionário"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <tr class="tabela-item">
          <td>Mussum Ipsum</td>
          <td>Cacilds vidis litro abertis</td>
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
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" placeholder="Categoria" class="modal-input" required>
          </div>
          <div class="form-group">
            <label for="projeto">Projeto</label>
            <input type="text" name="projeto" id="projeto" placeholder="Projeto" class="modal-input" required>
          </div> 
          <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" name="funcao" id="funcao" placeholder="Função" class="modal-input" required>
          </div> 
          <div class="form-group">
            <label for="curso">Curso</label>
            <input type="text" name="curso" id="curso" placeholder="Curso" class="modal-input" required>
          </div> 
          <div class="form-group">
            <label for="carga">Carga </label>
            <input type="number" name="carga" id="carga" placeholder="Carga horária" class="modal-input" min="0" required>
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
                <tr>
                  <td>
                    <select name="dia" id="dia" class="modal-select">
                      <option value="2">Seg.</option>
                      <option value="3">Ter.</option>
                      <option value="4">Qua.</option>
                      <option value="5">Qui.</option>
                      <option value="6">Sex.</option>
                      <option value="7">Sab.</option>
                    </select>
                  </td>
                  <td>
                    <input type="time" class="modal-input" name="entrada">
                  </td>
                  <td>
                    <input type="time" class="modal-input" name="saida">
                  </td>
                  <td>
                    <a href="#" class="btn btn-apagar delete" title="Apagar horário"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
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