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
      <link rel="stylesheet" href="/css/font-awesome.min.css">

      <script type="text/javascript" src="/js/init.js"></script>
   </head>
   <body>
      @include('shared.landing.top-nav')
      @yield('content')

       <footer class="page-footer grey lighten-3  footer">
          <div class="container ">
            <div class="row">
              <div class="col l6 s12 grey-text">
                <h5 class="grey-text text-darken-1">Sistema de tutorias <a href="https://ittg.edu.mx" target="_blank">ITTG</a></h5>
                <p class="grey-text text-darken-1">Carretera Panamericana Km. 1080, C.P. 29050, Apartado Postal: 599,
</p>
                  <p>
                     contacto@ittg.edu.mx
                  </p>
                  <p>
                     Tel. (961)61 5 04 61 Fax: (961)61 5 16 87
                  </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="grey-text text-darken-1">Conocenos</h5>
                <ul>
                  <li>
                     <a class=" blue-text text-darken-4" href="http://facebook.com/radiotec.tuxtla" target="_blank"> 
                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li>
                     <a class="ight-blue-text text-lighten-1 href="https://twitter.com/TecTuxtla" target="_blank">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li>
                     <a class="grey-text text-darken-3" href="http://mail.ittg.edu.mx/" target="_blank">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                     </a>
                  </li>
                   <li>
                     <a class="red-text" href="https://www.youtube.com/channel/UCFKQoopRmmH71Mm3sNbwa7w" target="_blank">
                        <i class="fa fa-youtube-square" aria-hidden="true"></i>
                     </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright grey-text text-darken-1">
            <div class="container ">
            © 2017 Tutorias ITTG
{{--             <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
 --}}            </div>
          </div>
        </footer>

   </body>
</html>

     
      
