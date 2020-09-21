@extends('layouts/app')

@section('content')
    <div class="container-fluid w-75">
        <h1>Home</h1>
        <ul>
            @foreach ( $posts as $post )
                <li><a href="/posts/{{$post->post_name}}">Title : {{$post->post_title}}</a> </li>
            @endforeach
        </ul>
    </div>
@endsection
