@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">               
            <a class="btn btn-success" href="{{route('roles.create')}}"> Create New</a>       
                </div>       
    </div>
</div>
<table class="table table-bordered">
  <tr>
     <th>Name</th>
     <th>Slug</th>
     <th width="280px">Action</th>
  </tr>
  @foreach ($roles as $role)
    <tr>
        <td>{{$role->name}}</td>
        <td>{{$role->slug}}</td>
        <td>
            <a class="btn btn-info" href="{{route('roles.show',$role->id)}}">Show</a>
          
            &nbsp;
            <form action="{{ route('roles.edit', $role->id) }}" method="GET" style="display: inline-block;">
              <button type="submit" class="btn btn-primary">Edit</button>            
            </form>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>       
        </td>
    </tr>
   @endforeach
</table>
@endsection