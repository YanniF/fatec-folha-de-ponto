let pagina = (window.location.pathname); // pega o endereço
// pagina = pagina.substring(pagina.lastIndexOf('/') + 1); // pega o nome da página

// carrega os eventos dependendo do que a página usa
if (pagina.includes('impressao')) {
  carregarPesquisar();
  irParaImpressao();
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

  // clica fora do input, limpa o campo, e volta a exibir todas as linhas da tabela
  pesquisarInput.addEventListener('blur', function() {
    pesquisarInput.value = "";

    document.querySelectorAll('.tabela-item').forEach((linha) => {
      linha.style.display = 'table-row';
    })
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

function alterarTabela() {
  
  const btnAddLinha = document.getElementById('btnAddLinha');
  const tbody = document.getElementById('horario');
  // const btnApagarLinha = document.querySelector('.delete');
  
  btnAddLinha.addEventListener('click', function(e) {
    
    e.preventDefault();
    const linha = document.createElement('tr');

    linha.innerHTML = `
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
        <input type="time" class="modal-input" name="entrada[]" placeholder="00:00">
      </td>
      <td>
        <input type="time" class="modal-input" name="saida[]" placeholder="00:00">
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

function alerta() {
  if(document.querySelector('.alerta')) {
    setTimeout(function() {
      document.querySelector('.alerta').remove();
    }, 2500);
  }
}

function irParaImpressao() {
  
  const botaoModalImprimir = document.getElementById('irImpressao');
  const botoesImprimir = document.querySelectorAll('.btn-imprimir');
  const botaImprimirTudo = document.getElementById('btnMostrarModal');

  // passa o código para o botão do modal 
  Array.from(botoesImprimir).forEach(botao => {

    botao.addEventListener('click', function() {
      botaoModalImprimir.dataset.id = botao.dataset.id;
    });    
  });

  // se for para imprimir todos, o data-id será 0
  botaImprimirTudo.addEventListener('click', function() {
    botaoModalImprimir.dataset.id = botaImprimirTudo.dataset.id;
  });

  carregarModal();

  botaoModalImprimir.addEventListener('click', function() {
    const dataId = botaoModalImprimir.dataset.id;
    const p = pagina.split('/');

    // adm/imprimir/08/2018/2
    if(dataId == 0) {
      botaoModalImprimir.setAttribute('href',  
        `/${p[1]}/imprimirtudo/${document.getElementById('mes').value}/${document.getElementById('ano').value}`);
    }
    else {
      botaoModalImprimir.setAttribute('href', 
        `/${p[1]}/imprimir/${document.getElementById('mes').value}/${document.getElementById('ano').value}/${botaoModalImprimir.dataset.id}`);
    }
  })
}