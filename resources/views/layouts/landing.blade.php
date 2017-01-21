<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="https://www.ittg.edu.mx/favicon.ico">

      <title>{{ config('app.name', 'Laravel') }}</title>
      
      <link rel="stylesheet" href="/css/app.css">
       <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

      <script type="text/javascript" src="/js/init.js"></script>
   </head>
   <body>
      @include('shared.landing.top-nav')
      @yield('content')

   </body>
</html>

     
      
