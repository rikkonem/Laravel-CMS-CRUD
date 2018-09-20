@extends('layout.layout')

@section('body')
    <div class="form-container">
        @include('common.status')

        <h4>Change Password</h4>
        <form method="POST" action="{{url('/changePassword')}}">
            {{ csrf_field() }}

            <input type="password" name="current_password" id="current_password" placeholder="current password" class="form-inputs">


            <input type="password" name="new_password" id="new_password" placeholder="new password" class="form-inputs">


            <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" class="form-inputs">

            <input type="submit" value="Reset password">

        </form>

    @include('common.errors')
@endsection