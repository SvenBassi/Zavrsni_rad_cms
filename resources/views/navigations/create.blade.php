@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
    <h1> Add Navigation </h1> <br>
    <form action="{{ route('lists.index') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-success" style="display: inline-block;">Back</button>
    </form>
    &nbsp;
    <form action="{{ route('navigations.index') }}" method="GET" style="display: inline-block;">
        <button type="submit" class="btn btn-primary" style="display: inline-block;">Edit</button>
    </form>
    <div class="content"><br>
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('navigations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ old('name') }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please enter a name.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputRole">Connect with List:</label>
                <select class="form-control" id="exampleInputPage" name="lists" nullable>
                    <option value="">Select List Title</option>
                    @foreach($lists as $list)
                        <option value="{{ $list->id }}">{{ $list->title }}</option>
                    @endforeach
                </select>
                </div>
                <br>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection