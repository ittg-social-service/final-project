<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Tutorias</title>

      <!-- CSS  -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

      <link rel="stylesheet" href="/fonts/avenir-lt-std/AvenirLTS.css">
      <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css" type="text/css"/>
      <link rel="stylesheet" type="text/css" href="/font/f1/flaticon.css">
      <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link rel="stylesheet" href="/css/animate.css">
      <link href="/css/time-picker/default.time.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      @yield('css')
        <!-- JavaScripts -->
        <!--  Scripts-->
      <script type="text/javascript" src="/js/jquery.js"></script>
      <script type="text/javascript" src="/js/init.js"></script>
      <script type="text/javascript" src="/js/materialize.js"></script>
      @yield('js')
</head>
<body>
  @yield('content')

  {{-- <script type="text/javascript" src="/js/jquery.fullPage.min.js"></script> --}}
</body>
</html>
