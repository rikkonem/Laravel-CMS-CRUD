@extends('layout.layout')

@section('body')
    <div class="form-container">
        @include('common.status')

        <h4>Invite User</h4>
        <form  method="POST" action="{{ url('invite') }}">
            {{ csrf_field() }}

            <input id="email" type="email" class="form-inputs" name="email" value="{{ old('email') }}" placeholder="Email" required>

            <label for="role">Select user role</label>
            <select id="role" name="role" class="form-inputs" required>
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>

            <input type="submit" value="Send invitation">
        </form>
    </div>

    @include('common.errors')
@endsection