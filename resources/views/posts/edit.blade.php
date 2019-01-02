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
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
            CKEDITOR.replace( 'body' , {
                removePlugins: 'image, Maximize'
            });
        </script>
@endsection