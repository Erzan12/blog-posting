@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>All Blog Posts</h1>
    @if(session('success')) 
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      @foreach($posts as $post)
            <div class="card mt-4">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->body}}</p>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onclick="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <a href="#" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
      @endforeach
  </div>
@endsection