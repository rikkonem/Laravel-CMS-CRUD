@extends('layout.layout')
@section('body')
    <div class="form-container">

        <h4>Add Post</h4>
       <form method="POST" action="{{route('post.store')}}">
           {{csrf_field()}}

            <input type="text" name="title" id="title" class="form-inputs" placeholder="Title" value="{{ old('title') }}" required>

            <textarea name="body" id="post-ckeditor" required></textarea>
            <br>
            <input type="submit" value="Post">
        </form>
    </div>
@include('common.errors')
   <script src="{{ asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
   <script>
       var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
       CKEDITOR.replace( 'post-ckeditor', {
          filebrowserImageBrowseUrl: route_prefix + '?type=Images',
           filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
           filebrowserBrowseUrl: route_prefix + '?type=Files',
           filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'

       });


   </script>
@endsection