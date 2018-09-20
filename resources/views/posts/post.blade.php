@extends('layout.layout')
@section('body')

        <article class="post-full">
            <h3 class="post-title">
                {{$post->title}}
            </h3>
            <p class="post-title">
                {!! $post->body !!}
            </p>
        </article>
    <!-- Comments section -->
        <hr>
        @include('common.status')

        <form method="POST" action="../posts/{{$post->id}}/comments">
            {{method_field('PATCH')}}
            {{csrf_field()}}

            <textarea name="body" placeholder="Your comment here..." class="form-inputs" required></textarea>
            <br>
            <input type="submit" value="Add comment">
        </form>

        <h4>Comments:</h4>

       @if($post->comments->isEmpty())
           <p>Be the first to comment</p>
       @endif

        @foreach($post->comments as $comment)

            <p>{{$comment->body}}</p>

            @if (getenv('REMOTE_ADDR') == $comment->author_ip || Auth::user())
                <form action="{{ url('comments/' . $comment->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="comment-delete">Delete comment</button>
                </form>
            @endif

        @endforeach


    @include('common.errors')
@endsection