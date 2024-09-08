@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>All Blog Posts</h1>
    @if(session('success')) 
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <!-- Filter Section -->
    <div class="filter-section mb-4">
        <label for="categoryFilter">Filter by Category:</label>
        <select id="categoryFilter" class="form-control">
            <option value="">All Categories</option>
            <option value="tech">Tech</option>
            <option value="lifestyle">Lifestyle</option>
            <option value="education">Education</option>
            <!-- Add more categories as needed -->
        </select>
    </div>

            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


      @foreach($posts as $post)
            <div class="card mt-4">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->body}}</p>

                <div class="buttons">
                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                  
                  <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onclick="return confirm('Are you sure you want to delete this post?');">
                      @csrf
                      @method('DELETE')    
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </div>
              </div>
            </div>
      @endforeach
      <div class="pagination-wrap">
        {{ $posts->links('vendor.pagination.custom')}}
      </div>

  </div>
@endsection