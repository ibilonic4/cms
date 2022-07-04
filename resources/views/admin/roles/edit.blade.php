<x-admin-master>
@section('content')


@if(session()->has('permission-delete'))

<div class="alert-danger"> {{session('permission-delete')}} </div>
@endif

<div class="row">
<div class="col-sm-6">




<h1> Edit role: {{$role->name}} </h1>

<form action="{{route('roles.update', $role->id)}}" method="post">
@csrf
@method('PATCH')

<div class="form-group">
<input type="text" class="form-control" name="name" id="name" value="{{$role->name}}">
</div>

<button class="btn btn-primary"> Update </button>
</form>

</div>

</div>


<div class="row">
    <div class="col-lg-12">

         @if($permissions->isNotEmpty())

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                      
              
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Delete</th>
                       
                        
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($permissions as $permission)
                  <tr>
                    <td>
                        <input type="checkbox"
                        @foreach ($role->permissions as $role_permission)
                        @if($role_permission->slug == $permission->slug)

                        checked 
                        @endif
                        @endforeach
                    ></td>
                 <td> {{$permission->id}}</td>
                 <td> {{$permission->name}}</td>
                 <td> {{$permission->slug}}</td>
                 <td>
                    <form method="post" action="{{route('permissions.destroy', $permission->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type = "submit" class="btn btn-danger">Delete</button>
                       </form>


                  </td>

                  </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
    @endif
    </div>

</div>

@endsection




</x-admin-master>