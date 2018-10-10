@extends('layouts/app')
@section('content')
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group has-feedback {!! $errors->has('email') ? 'has-error' : '' !!}">
          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

          @if ($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="form-group has-feedback {!! $errors->has('password') ? 'has-error' : '' !!}">
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

          @if ($errors->has('password'))
            <span class="help-block">{{ $errors->first('password') }}</span>
          @endif

        </div>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {!! old('remember') ? 'checked' : '' !!}> Remember Me
                
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>

      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
@stop

