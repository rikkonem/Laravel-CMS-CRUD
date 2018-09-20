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
       CKEDITOR.replace( 'post-ckeditor', {
          removeButtons: "Image"
       });
   </script>
@endsection