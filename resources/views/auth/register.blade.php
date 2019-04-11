@extends('layouts.interface')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div style="width:300px;">
      <img src="/img/grupoplus_logo.png" class="img-fluid" style="width:100%;">
    </div>
  </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Registrar Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                          <div class="form-group col">
                              <label for="name">Nombre</label>
                                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                            </div>
                        </div>

                         <div class="row">
                         <div class="form-group col">
                              <label for="initials">Iniciales</label>
                                  <input id="initials" type="text" class="form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}" name="initials" value="{{ old('initials') }}" required autofocus>
                                  @if ($errors->has('initials'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('initials') }}</strong>
                                      </span>
                                  @endif
                          </div>
                         </div>   
                        
                        <div class="row">
                          <div class="form-group col">
                              <label for="email">Correo Electrónico</label>
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col">
                              <label for="password">Contraseña</label>
                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col">
                              <label for="password-confirm">Confirmar Contraseña</label>
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
