<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Folha de Ponto | Página não encontrada</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> 
  <link rel="shortcut icon" type="image/png" href="{{ asset ('img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <main class="erro">
      <h1>Página não encontrada</h1>
      <figure>
        <img src="{{asset('img/404.gif')}}" alt="Ninguém encontra essa página">
      </figure>
      <a href="{{ url('/') }}" class="btn btn-imprimir">Voltar</i></a>
    <main>
  </div>
</body>
</html>

  
