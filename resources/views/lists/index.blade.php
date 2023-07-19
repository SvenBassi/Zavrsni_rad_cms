@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="nav flex-column">
              <form action="{{ route('navigations.create') }}" method="GET">
                <button type="submit" class="btn btn-success">Add Navigation</button>
              </form>
              <br>
              <form action="{{ route('navigations.index') }}" method="GET">
                <button type="submit" class="btn btn-info">Navigations</button>
              </form>
              <br>
              <br>
              @foreach($navigations as $navigation)
              <li class="nav-item">
                @if($navigation->lists)
                @php
                $list = $lists->firstWhere('id', $navigation->lists);
                @endphp
                @if($navigation)
                <a href="{{ route('lists.show', $list->id) }}" class="text-decoration-none ">
                  <h5><strong>{{ $navigation->name }}</strong></h5>
                </a>
                @endif
                @endif
              </li>
              @endforeach
            </ul>
          </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('lists.create')}}"> Create New</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Role</th>
            <th>Image</th>
            <th width="230px">Action</th>
        </tr>
        @foreach ($lists as $list)
	    <tr>
	        <td>{{$list->title}}</td>
	        <td>{{$list->description}}</td>
	        <td>{{ app('App\Http\Controllers\RoleController')->getRole($user->role) }}</td>
	        <td>
                @if($list->img_path)
                <img src="{{ asset('storage/images/'.$list->img_path) }}" style="width:10%">
                @else                
                <img src="/images/default-image.jpg" alt="" style="width: 10%">
                @endif
            </td>
                <td>  
                <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                    <a class="btn btn-info" href="{{route('lists.show',$list->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('lists.edit',$list->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
	        </td>
	    </tr>
        @endforeach
    </table>
@endsection