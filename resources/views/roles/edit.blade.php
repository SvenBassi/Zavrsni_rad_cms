@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
    </div>
</div>
<div class="pull-right">
    <a class="btn btn-primary" href="{{route('roles.index')}}"> Back</a>
</div>
<form action="{{route('roles.update',$role->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control"  value="{{ $role->name }}" placeholder="title">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slug:</strong>
            <input type="text" name="slug" class="form-control" value="{{ $role->slug }}"  placeholder="title">
            <br/>         
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>


@endsection
