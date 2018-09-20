@extends('layout.layout')
@section('body')

    <div class="form-container">

        <h4>Edit Post</h4>
        {!! Form::model($post, ['action' => ['PostController@update', $post->id], 'method' => 'patch']) !!}
        @csrf
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-inputs']) !!}


            {!! Form::textarea('body', null) !!}
            <br>
            <input type="submit" value="Edit">

    {!! Form::close() !!}
    </div>


    @include('common.errors')
        <script src="{{ asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'body' , {
                removeButtons: "Image"
            });
        </script>
@endsection