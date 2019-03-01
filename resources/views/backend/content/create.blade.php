@extends('backend_layout')
@section('backend_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('backend/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('backend/content') }}">Content</a></li>
		<li class="active"><a>Add Content</a></li>
	</ul>
</div>
<div class="col-md-12" align="center">
	@if(Session::has('message'))
	{{ Session::get('message') }}
	@endif
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-plus" style="margin-top: 5px;"></i>&nbsp;<b><i>Add Data</i></b>
		</div>
		<div class="panel-body">
			{{ Form::open(array('route' => 'backend/content/insert', 'files' => true)) }}
			<div class="form-group">
				<label>title :</label>
				{{ Form::text('title' , '', array('class'=>'form-control','placeholder'=>'Name Of Project/Company/School	')) }}
				@if($errors->has('title'))
				<span style="color:red">{{ $errors->first('title') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>sub title :</label>
				{{ Form::text('subtitle' , '', array('class'=>'form-control','placeholder'=>'year or achievment')) }}
				@if($errors->has('subtitle'))
				<span style="color:red">{{ $errors->first('subtitle') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Description :</label>
				{{ Form::textarea('description' , '', array('class'=>'form-control','placeholder'=>'Description Of Item')) }}
				@if($errors->has('description'))
				<span style="color:red">{{ $errors->first('description') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>category :</label>
				{{ Form::select('category', $category, '',array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>Cover content (Image) :</label>
				<input type="file" name="file" id="pick_file" />
				@if($errors->has('file'))
				<span style="color:red">{{ $errors->first('file') }}</span>
				@endif
			</div>
			<div>
				<img src="{{asset('resources/assets/image')}}/no_photo.png" id="show_file" style="height:150px;width:150px;">
			</div>
			<div class="form-group" align="center">
				{{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@section('backend_include_js_content')
<script src="{{ asset('resources/assets/js/backend/showFoto.js') }}"></script>
@stop
@stop			