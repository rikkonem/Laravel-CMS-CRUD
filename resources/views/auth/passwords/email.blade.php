@extends('layout.layout')

@section('body')
    <div class="form-container">

        <h4>Password Reset</h4>
        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <input id="email" type="email" class="form-inputs" name="email" value="{{ old('email') }}" placeholder="Email" required>

            <input type="submit" value="Send Password Reset Link">

        </form>
    </div>

@endsection
