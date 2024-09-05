@extend('layouts.app')

@section('content')
  <div class="container">
    <h1>All Blog Posts</h1>
      @foreach($posts as $post)
            <div class="card mt-4">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->body}}</p>
              </div>
            </div>
      @endforeach
  </div>
@endsection