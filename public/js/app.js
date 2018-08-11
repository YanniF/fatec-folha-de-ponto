let pagina = (window.location.pathname); // pega o endereço
// pagina = pagina.substring(pagina.lastIndexOf('/') + 1); // pega o nome da página

// carrega os eventos dependendo do que a página usa
if (pagina.includes('impressao')) {
  carregarPesquisar();
}
else if(pagina.includes('adm') || pagina.includes('feriado') || pagina.includes('prof')) {
  carregarModal();
  carregarPesquisar();
  alerta();
}

if(pagina.includes('prof') && !pagina.includes('impressao')) {
  alterarTabela();
}

if (pagina.includes('exibir')) {
  mostrarModal();
}


//--- FUNCTIONS ---//

function carregarPesquisar() {

  const pesquisarInput = document.getElementById('pesquisar-input');
  const pesquisarIcon = document.getElementById('pesquisar-icon');

  // clica no span que envolve o ícone para focar no input, aumentando o tamanho
  pesquisarIcon.addEventListener('click', function() {
    pesquisarInput.focus();
  });

  // clica fora do input, limpa o campo
  pesquisarInput.addEventListener('blur', function() {
    pesquisarInput.value = "";
  });

  // a cada tecla pressionada, vai verificar se existe aquele conjunto de caracteres na 1ª célula da linha
  pesquisarInput.addEventListener('keyup', function(e) {
    const texto = e.target.value.toLowerCase();

    document.querySelectorAll('.tabela-item').forEach((linha) => {
      const item = linha.cells[0].textContent;

      if(item.toLowerCase().indexOf(texto) != -1) {
        linha.style.display = 'table-row';
      }
      else {
        linha.style.display = 'none';
      }
    })
  });
}

function carregarModal() {
  
  const modal = document.getElementById('modal-wrapper');

  document.getElementById('btnMostrarModal').addEventListener('click', mostrarModal);
  
  document.querySelector('.btn-fechar').addEventListener('click', esconderModal);
  
  modal.addEventListener('click', function(e) {
    if(e.target === modal) {
      esconderModal();
    }    
  });
}

function alterarTabela() {
  
  const btnAddLinha = document.getElementById('btnAddLinha');
  const tbody = document.getElementById('horario');
  const btnApagarLinha = document.querySelector('.delete');
  
  btnAddLinha.addEventListener('click', function(e) {
    
    e.preventDefault();
    const linha = document.createElement('tr');

    linha.innerHTML = `
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
        <input type="time" class="modal-input" name="entrada" placeholder="00:00">
      </td>
      <td>
        <input type="time" class="modal-input" name="saida" placeholder="00:00">
      </td>
      <td>
        <a href="#" class="btn btn-apagar delete" title="Apagar horário"><i class="fas fa-trash-alt"></i></a>
      </td>
    `;

    tbody.appendChild(linha);
  });

  tbody.addEventListener('click', function(target) {
    
    const alvo = target.target;
    if(alvo.className === 'btn btn-apagar delete') {
      alvo.parentElement.parentElement.remove();
    }
    // melhorar isso aqui
    else if(alvo.parentElement.className.baseVal  == 'svg-inline--fa fa-trash-alt fa-w-14') {
      alvo.parentElement.parentElement.parentElement.parentElement.remove(); // dai me forças
    }    
  });
}

function mostrarModal() {
  const modal = document.getElementById('modal-wrapper');

  modal.classList.add('flex');
  modal.classList.remove('hidden');
}

function esconderModal() {
  const modal = document.getElementById('modal-wrapper');

  modal.classList.add('hidden');
  modal.classList.remove('flex');

  if (pagina.includes('exibir')) {
    const p = pagina.split('/');
    window.location.href = "/" + p[1];
  }
}

function alerta() {
  if(document.querySelector('.alerta')) {
    setTimeout(function() {
      document.querySelector('.alerta').remove();
    }, 2500);
  }    
}
