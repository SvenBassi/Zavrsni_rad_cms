@extends('layouts.app')
@section('content')
<body style="margin-left: 15px;">
    <h1> Edit Navigation </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('navigations.update', ['navigation' => $navigation->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ $navigation->name }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please enter a name.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputRole">Edit Connection:</label>
                    <select class="form-control" id="exampleInputPage" name="lists" nullable>
                        <option value="{{$navigation->list}}">Select List Title</option>
                        @foreach($lists as $list)
                            <option value="{{ $list->id }}" {{ $navigation->list_id == $list->id ? 'selected' : ''}}>
                                {{$list->title}}
                            </option>
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