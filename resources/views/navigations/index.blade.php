@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
<br>
      <form action="{{ route('lists.index') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-success" style="display: inline-block;">Back</button>
      </form>
  <br>
  <div class="container">
      <div class="table table-bordered table-striped text-center">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>List Title</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($navigations as $navigation)
          <tr>
            <td>{{ $navigation->name ?? '' }}</td>
            <td>{{ app('App\Http\Controllers\ListController')->getList($navigation->lists ?? '') }}</td>
            <td>
              <form action="{{ route('navigations.destroy', $navigation->id) }}" method="POST" style="display: inline-block;">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              &nbsp;
              <form action="{{ route('navigations.edit', $navigation->id) }}" method="GET" style="display: inline-block;">
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      </div>
    </div>

@endsection