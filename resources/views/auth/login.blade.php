@extends('layout.layout')

@section('body')
    <div class="form-container">

        <h4>Login</h4>
        <form method="POST" action="{{ route('login') }}" >
            @csrf

            <input id="email" type="text" class="form-inputs" name="email" value="{{ old('email') }}" placeholder="Email or Login" required autofocus>

            <input id="password" type="password" class="form-inputs" name="password" placeholder="Password" required>


                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label  for="remember">
                    {{ __('Remember Me') }}
                </label>
                <a class="form-forgot-password" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                <br>

            <input type="submit" value="Login">

        </form>
        @include('common.errors')

    </div>

@endsection
