@extends('layouts/app')

@section('content')
    <div class="container">
        <h2 class="alert alert-success">Laravel</h2>
        @if($message = Session::get('Success'))
            <div class="alert alert-success">
                <p align="center">{{$message}}</p>
            </div>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <p align="center">{{$message}}</p>
            </div>
        @endif
    </div>
    <div align="right" class="container">
        <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">Add New Article</a>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <tr class="text-center">
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            @foreach($posts as $post)
                <tr class="text-center">
                    <td width="10%">{{ $post->id }}</td>
                    <td>{{ $post->post_title }}</td>
                    <td width="25%">{{ $post->post_content }}</td>
                    <td> {{ $post->post_name }}</td>
                    <td>{{ $post->post_status }}</td>
                    <td width="25%">
                        <form action="{{ route('articles.destroy', $post->id) }}" method="POST">
                            <a href="{{ route('articles.show', $post->id) }}" class="btn btn-warning">Show</a>
                            <a href="{{ route('articles.edit', $post->id) }}" class="btn btn-info">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
