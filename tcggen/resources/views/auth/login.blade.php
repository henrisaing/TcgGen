@extends('layouts.main')

@section('content')
<nav>
    <br>
    <h2>Login</h2>
</nav>
<div class="card">
<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    E-Mail Address

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <br>
                <span style="color:red">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    <br>
    Password

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span style="color:red">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    </div>
<br>

                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>

<br><br>
    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
            <br><br>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </div>
</form>
</div>
@endsection
