@extends('layouts.main')

@section('content')
<nav>
    <br>
    <h2>Reset Password</h2>
</nav>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="card">
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
            E-Mail Address
            <br>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <br>
                    <span style="color:red">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            <br><br>
        <button type="submit" class="btn btn-primary">
            Send Password Reset Link
        </button>
    </form>
</div>
@endsection
