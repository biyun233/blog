@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h2 class="alert alert-success text-center color:red">Create an article here!</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="col-md-12">
                    <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @csrf
                        <form>
                            <div class="container">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" id="post_title" placeholder="Title" value="{{ old('nom') }}">
                                    @error('post_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('post_name') is-invalid @enderror" name="post_name" id="post_name" placeholder="Author" value="{{ old('nom') }}">
                                    @error('post_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control @error('post_content') is-invalid @enderror" name="post_content" id="post_content" placeholder="Content" cols="30" rows="10">{{ old('message') }}</textarea>
                                    @error('post_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('articles.index') }}" class="btn btn-warning">Cancel</a>
                            <button type="submit" name="add" class="btn btn-info input-lg">Create Article</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
