<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Folha de Ponto | @yield('title')</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> 
  <link rel="shortcut icon" type="image/png" href="{{ asset ('img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <header>
      <img src="{{ asset('img/logoFatec.png') }}" alt="Fatec PG">
      <img src="{{ asset('img/logoCPS.png') }}" alt="Centro Paula Souza">
      <img src="{{ asset('img/logoGoverno.png') }}" alt="Governo do Estado de São Paulo">
    </header>
      
      @yield('content')

    <footer>
      <p>Desenvolvido por <a href="http://yannifraga.com" target="_blank">Yanni Fraga</a> - DTI 2018</p>
    </footer>
  </div>

  @yield('modal')

  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <script src="{{ asset ('js/app.js') }}"></script>
</body>
</html>