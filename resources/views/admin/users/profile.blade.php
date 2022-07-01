<x-admin-master>
@section('content')

<h1> {{$user->name}}'s profile</h1>


<div class="row">

    <div class="col-sm-6">

<form method="post" action="{{route('user.profile.update',$user)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-4">
        <img class="img-profile rounded-circle" src="{{asset($user->getUserImageAttribute($user->avatar))}}" height="150" width="150">
    </div>
    <div class="form-group">
        
        <label for="">Avatar</label>
        <input id="avatar" class="form-control-file {{$errors->has('avatar') ? 'is-invalid' : ''}}"
         type="file" name="avatar"  >
         @error('avatar')
         <div class="alert alert-danger">{{$message}}</div>
     @enderror
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" class="form-control  {{$errors->has('username') ? 'is-invalid' : ''}}"
         type="text" name="username"  value="{{$user->username}}">
        @error('username')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}"
        type="text" name="name"  value="{{$user->name}}">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" class="form-control  {{$errors->has('email') ? 'is-invalid' : ''}}"
         type="text" name="email"  value="{{$user->email}}">
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}" 
        type="password" name="password" >
        @error('password')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" class="form-control" type="password" name="password-confirm" >
        @error('password-confirm')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
</div></div>
@endsection
</x-admin-master>