<?php
  use Carbon\Carbon;
  setlocale (LC_TIME, 'pt_BR');

  function imprimirInfo($data, $feriados) {
    
    if($feriados != null) {
      foreach ($feriados as $feriado) {
        if($data->toDateString() == $feriado->data) {
          return $feriado->informacao;
        }
      }
    }
    
    return '';     
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Folha de Ponto | Impressão</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> 
  <link rel="shortcut icon" type="image/png" href="{{ asset ('img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('css/style-print.css') }}">
</head>
<body>
  <a href="{{ url('/prof/impressao') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
  <a href="javascript:window.print()" id="btnImprimirFolha" class="btn btn-imprimir" title="Imprimir folha de ponto"><i class="fas fa-print"></i></a>
  <div class="container">  
    
    <?php $data = Carbon::createFromDate($ano, $mes, 1); ?>
    <header>
      <div class="header-imagem">
        <img src="{{ asset('img/brasao.png') }}" alt="Brasão do Estado de São Paulo">
      </div>
      <div class="header-texto">
        <p>GOVERNO DO ESTADO DE SÃO PAULO</p>
        <p>SECRETARIA DE DE DESENVOLVIMENTO</p>
        <p>Unidade: CENTRO PAULA SOUZA - FATEC PRAIA GRANDE </p>
        <p>REGISTRO DE PONTO-HAE &emsp; &emsp; MÊS/ANO: {{ ucfirst(strftime('%B/%Y', strtotime($data))) }}</p>
      </div>
    </header>
    <div class="info-prof">
      <div class="row">
        <p>Docente: {{$prof->nome}}</p>
        <p>Categoria: {{$prof->categoria}}</p>
      </div>
      <div class="row">
        <p>Projeto: {{$prof->projeto}}</p>
      </div>
      <div class="row">
        <p>Função: {{$prof->funcao}}</p>
      </div>
      <div class="row">
        <p>Cursos: {{$prof->curso}}</p>
      </div>
      <div class="row">
        <p>Carga Horária Total: {{$prof->carga}}</p>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th rowspan="2" colspan="2">Dia</th>
          <th colspan="2">Entrada</th>
          <th colspan="2">Saída</th>
          <th rowspan="2">Observações</th>
        </tr>
        <tr>
          <th>Hora</th>
          <th>Assinatura</th>
          <th>Hora</th>
          <th>Assinatura</th>
        </tr>
        <tbody>
          <?php
            for($c = 1; $c <= $data->daysInMonth; $c++) {
              
              for($i = 0; $i < count($prof->dia); $i++) {
                if(strtolower($prof->dia[$i]) == $data->formatLocalized('%a')) {
                  echo '<tr>';
                  echo '<td>' . $data->day . '</td>';
                  echo '<td>' . $prof->dia[$i] . '</td>';
                  echo '<td>' . $prof->entrada[$i] . '</td>';
                  echo '<td>' . imprimirInfo($data, $feriados) . '</td>';
                  echo '<td>' . $prof->saida[$i] . '</td>';
                  echo '<td>' . imprimirInfo($data, $feriados) . '</td>';
                  echo '<td></td>';
                  echo '</tr>';
                }
              }
              if($data->dayOfWeek == 0) {
                echo 
                '<tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>DOMINGO</td> 
                  <td></td>
                  <td>DOMINGO</td> 
                  <td></td>
                </tr>';
              }          
              
              if($data->day != $data->daysInMonth) 
                $data = $data->addDay();
            }             
          ?>
        </tbody>
      </thead>
    </table>
    <div class="assinatura">
      <div class="servidor">
        <p>Assinatura do Servidor</p>
      </div>
      <div class="superior">
        <p>Assinatura do Superior Imediato</p>
      </div>
      <div class="data">
        <p>Data ____/____/____</p>
      </div>
    </div>
  </div>

  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</body>
</html>