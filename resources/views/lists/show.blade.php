@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('lists.index')}}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{$list->title}}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{$list->description}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                @if($list->img_path)
                <img src="{{ asset('storage/images/'.$list->img_path) }}" style="width:10%">
                @else
                <img src="/images/default-image.jpg" alt="" style="width: 10%">
                @endif
            </div>
        </div>
    </div>
@endsection
