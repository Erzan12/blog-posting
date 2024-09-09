@extends('layouts.app')

@section('content')
  <div class="container">

    <h1>All Blog Posts</h1>

    @if(session('success'))
      <div class="notification d-flex justify-content-end">
        <div id="autoDismissAlert" class="alert alert-success alert-dismissible fade show small-alert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif

    <script>
        // Set a timeout to automatically close the alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            var alertElement = document.getElementById('autoDismissAlert');
            if (alertElement) {
                var alert = new bootstrap.Alert(alertElement);
                alert.close();  // Bootstrap's built-in method to close the alert
            }
        }, 3000);  // 5000ms = 5 seconds
    </script>

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