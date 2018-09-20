@extends('layout.layout')


@section('body')

    @include('common.status')

    @if($posts->isEmpty())
        <p>Whoops, we are out of posts. Please come back later!</p>
    @endif
    @foreach( $posts as $post)
        <article class="post">
        <a href="{{url('posts/' . $post->id)}}" class="post-title-link">
            <h3 class="post-title">
                {{$post->title}}
            </h3>
        </a>
        <div class="post-container">
            <i class="post-creating-date">{{$post->created_at->toFormattedDateString()}}</i>
        @auth
            @if(Auth::user()->id == $post->user_id OR Auth::user()->role == 'admin')
                <form action="{{ url('posts/' . $post->id) }}" method="POST" class="post-delete-form">
                    @method('DELETE')
                    @csrf
                    <button class="post-container-delete">Delete</button>
                </form>

                <a href="{{url('posts/edit/' . $post->id)}}" class="post-container-edit">Edit</a>
            @endif
        @endauth
        </div>
        <p class="post-content">
            {!! $post->preview($post->body, 40) !!}
        </p>
        </article>
    @endforeach

    {{$posts->links()}}

@endsection