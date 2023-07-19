@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('lists.index')}}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('lists.update', $lists->id) }}" method="POST" enctype="multipart/form-data">
		@method('PUT')
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Title:</strong>
		            <input type="text" name="title" class="form-control" value="{{ $lists->title }}"  placeholder="title">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description</strong>
		            <textarea class="form-control" style="height:150px" value="{{ $lists->description }}" name="description" placeholder="description">{{ $lists->description }}</textarea>
		        </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Image:</strong>
						<input type="file" class="form-control" id="image" name="img_path" nullable>
					</div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endsection