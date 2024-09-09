@foreach($posts as $post)
  <div class="post">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->excerpt }}</p>
    <p><small> Category: {{ $post->category }} </small></p>
  </div>
@endforeach

{{ $posts.links() }}