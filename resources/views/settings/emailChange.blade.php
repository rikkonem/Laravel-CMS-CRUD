@extends('layout.layout')

@section('body')
    <div class="form-container">
        @include('common.status')

        <h4>Change Email</h4>
        <form method="POST" action="{{url('/changeEmail')}}">
            {{ csrf_field() }}

            <input type="email" name="current_email" id="current_email" placeholder="Current email" class="form-inputs">

            <input type="email" name="new_email" id="new_email" placeholder="New email" class="form-inputs">

            <input type="password" name="password" id="password" placeholder="Password" class="form-inputs">

            <input type="submit" value="Change Email">

        </form>
    </div>

    @include('common.errors')
@endsection