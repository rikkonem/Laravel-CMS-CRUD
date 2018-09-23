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
            var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
            CKEDITOR.replace( 'body' , {
                filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: route_prefix + '?type=Files',
                filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
            });



        </script>
@endsection