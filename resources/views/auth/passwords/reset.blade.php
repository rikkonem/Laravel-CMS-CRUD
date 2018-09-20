@extends('layout.layout')

@section('body')
    <div class="form-container">

        <h4>Password reset</h4>

            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                    <input id="email" type="email" class="form-inputs" name="email" value="{{ $email ?? old('email') }}" placeholder="email"  required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <input id="password" type="password" class="form-inputs" name="password" placeholder="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <input id="password-confirm" type="password" class="form-inputs" name="password_confirmation" required>

                    <input type="submit" value="Reset password">

                </form>
    </div>
@endsection
