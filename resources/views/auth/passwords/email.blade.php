@extends('layouts.landing')
@section('content')
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
@stop
