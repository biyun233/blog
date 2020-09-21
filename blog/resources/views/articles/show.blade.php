
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal">
                    <fieldset>
                        <h3><sup>{{ $post->post_title }}</sup></h3>
                        <h3><sup>Author: {{ $post->post_name }}</sup></h3>
                        <p>{{ $post->post_content }}</p>

                        <hr>
                        <br>
                        <h4>Comments:</h4>
                        @foreach($comments as $comment)
                            <p>name : {{ $comment->comment_name }}</p>
                            <p>message : {{ $comment->comment_content }}</p>
                            <hr>
                        @endforeach

                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row card text-white justify-content-center">
            <h4 class="card-header bg-info">Laissez votre message</h4>
            <div class="container card-body w-50">
                <div class="card-body">
                    <form method="post" action="{{ route('articles.store_comment', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        <form>
                            <div class="container">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('comment_name') is-invalid @enderror" name="comment_name" id="comment_name" placeholder="Name" value="{{ old('nom') }}">
                                    @error('comment_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('comment_email') is-invalid @enderror" name="comment_email" id="comment_email" placeholder="Email" value="{{ old('nom') }}">
                                    @error('comment_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control @error('comment_content') is-invalid @enderror" name="comment_content" id="comment_content" placeholder="Content" cols="30" rows="10">{{ old('message') }}</textarea>
                                    @error('comment_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            <button type="submit" name="add" class="btn btn-info input-lg">Add a comment</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <a href="{{ route('articles.index') }}" class="btn bg-dark" style="color: white">Return</a>
    </div>


@endsection

