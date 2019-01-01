@extends('layout.layout')

@section('body')
    <div class="form-container">
        @include('common.status')

        <h4>Add User</h4>
        <form  method="POST" action="{{ url('register') }}">
            {{ csrf_field() }}

            <input id="username" type="text" class="form-inputs" name="username" value="{{ old('username') }}" placeholder="Username" required>

            <input id="email" type="email" class="form-inputs" name="email" value="{{ old('email') }}" placeholder="Email" required>

            <input id="password" type="password" class="form-inputs" name="password" placeholder="Password" required>

            <input id="password-confirm" type="password" class="form-inputs" name="password_confirmation" placeholder="Confirm password" required>

            <input type="hidden" value="{{request('role')}}" name="role">

            <input type="submit" value="Register">
        </form>
    </div>

    @include('common.errors')
@endsection