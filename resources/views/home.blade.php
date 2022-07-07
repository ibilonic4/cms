<x-home-master>


@section('content')
<h1>    Home </h1>

@foreach($posts as $post)
<!-- Blog Post -->
<div class="card mb-4">
    <img class="card-img-top" src="{{asset($post->getPostImageAttribute($post->post_image))}}" alt="Card image cap" width="900" height="auto" onerror="this.style.display='none'">
    <div class="card-body">
      <h2 class="card-title">{{$post->title}}</h2>
      <p class="card-text">{{Str::limit($post->body, '50','....')}}</p>
      <a href="{{route('blog.post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Posted on {{$post->created_at->diffForHumans()}} by
      <a href="#">{{$post->user->name}}</a>
    </div>
  </div>
@endforeach
  

  <!-- Pagination -->
  <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul>

@endsection



</x-home-master>