<x-admin-master>

@section('content')

<h1> CREATE </h1>
@foreach($errors->all() as $error)
                <p class="into-text">{{ $error}} </p>
                @endforeach 
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data"

>

    @csrf

<div class="form-group">
    <label for="title">Title</label>
    <input id="title" class="form-control" type="text" name="title" placeholder="Enter title">
</div>

<div class="form-group">
    <label for="file">Image</label>
    <input id="post_image" class="form-control-file" type="file" name="post_image" >
</div>


<div class="form-group">
  <textarea name="body" class="form-control" id="body" name="body" cols="30" rows="10"></textarea>
</div>

<button type="submit" class="btn btn-primary"> Submit </button>

</form>
@endsection
</x-admin-master>