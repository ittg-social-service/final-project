<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
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
        <div class="container">
            <div class="row">
               <div class="col m5 offset-m4">
                  <div class="card-panel">
                     <h5 class="general-form__header center">Restablecer contraseña</h5>
                     <div class="row">
                        <form class="col m12 s12" role="form" method="POST" action="{{ url('/password/email') }}">
                           {{ csrf_field() }}
                           <div class="row">
                                <div class="input-field col s12 m12">
                                  <input id="email" name="email" type="email" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                                  <label for="email" data-error="{{ $errors->first('email') }}">Correo</label>
                                </div>
                            </div>

                            <div class="row">
                               <button type="submit" class="btn col m10 s12 offset-m1  ">
                                    Enviar link de recuperacion
                               </button>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m5 offset-m4">
                    @if (session('status'))
                        <div class="card-panel center-align light-blue white-text">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>


