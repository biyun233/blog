
@extends('layouts.app')

@section('content')
    <div class="container-fluid w-75">
        <h1>{{ $post->post_title }}</h1>
        <h4>Author :{{ $post->post_name }}</h4>

        <p>{{ $post->post_content }}</p>
        <hr>
        <br>
        <h4>Comments:</h4>
        @foreach($comments as $comment)
            <p>name : {{ $comment->comment_name }}</p>
            <p>message : {{ $comment->comment_content }}</p>
            <hr>
        @endforeach

        <div class="row card text-white justify-content-center">
            <h4 class="card-header bg-info">Laissez votre message</h4>
            <div class="container card-body w-50">
                <div class="card-body">
                    <form action="{{ url('posts/{post_name}') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('comment_name') is-invalid @enderror" name="comment_name" id="comment_name" placeholder="Votre nom" value="{{ old('nom') }}">
                            @error('comment_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('comment_email') is-invalid @enderror" name="comment_email" id="comment_email" placeholder="Votre email" value="{{ old('email') }}">
                            @error('comment_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('comment_content') is-invalid @enderror" name="comment_content" id="comment_content" placeholder="Message" rows="8">{{ old('message') }}</textarea>
                            @error('comment_content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="submit" value="Envoyer!" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
