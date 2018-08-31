<?php
  use Carbon\Carbon;

  function imprimirInfo($data, $feriados) {
    if($data->dayOfWeek == 6) {
      return 'SÁBADO';
    }
    else if($data->dayOfWeek == 0) {
      return 'DOMINGO';
    }
    else if($feriados != null) {
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
  <a href="{{ url('/adm/impressao') }}" class="btn btn-voltar" title="Voltar"><i class="fas fa-arrow-left"></i></a>
  <a href="javascript:window.print()" id="btnImprimirFolha" class="btn btn-imprimir" title="Imprimir folha de ponto"><i class="fas fa-print"></i></a>
  <div class="container">  
    @foreach($adms as $adm)
    <?php $data = Carbon::createFromDate($ano, $mes, 1); ?>
    <header>
      <div class="header-imagem">
        <img src="{{ asset('img/brasao.png') }}" alt="Brasão do Estado de São Paulo">
      </div>
      <div class="header-texto">
        <p>GOVERNO DO ESTADO DE SÃO PAULO</p>
        <p>SECRETARIA DE DE DESENVOLVIMENTO</p>
        <p>Unidade: CENTRO PAULA SOUZA - FATEC PRAIA GRANDE </p>
        <p>REGISTRO DE PONTO MÊS/ANO: {{ ucfirst(strftime('%B/%Y', strtotime($data))) }}</p>
      </div>
    </header>
    <div class="info-adm">
      <div class="row">
        <p>Servidor: {{$adm->nome}}</p>
        <p>RG: {{$adm->rg}}</p>
      </div>
      <div class="row">
        <p>Cargo/Função: {{$adm->cargo}}</p>
      </div>
      <div class="row">
        <p>Jornada de Trabalho: {{$adm->jornada}}</p>
        <p>Regime de Plantão: {{$adm->plantao ? 'sim' : 'não'}}</p>
      </div>
      <div class="row">
        <p>Horário: {{$adm->horario}}</p>
      </div>
      <div class="row">
        <p>Intervalo de Almoço e Descanso: {{$adm->intervalo}}</p>
        <p>Horário de Estudante: {{$adm->estudante ? 'sim' : 'não'}}</p>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th rowspan="2">Dia</th>
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
              
              echo '<tr>';
              echo '<td>' . $data->day . '</td>';
              echo '<td></td>';
              echo '<td>' . imprimirInfo($data, $feriados) . '</td>';
              echo '<td></td>';
              echo '<td>' . imprimirInfo($data, $feriados) . '</td>';
              echo '<td> </td>';
              echo '</tr>';

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
    @endforeach
  </div>

  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</body>
</html>