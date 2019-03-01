@extends('backend_layout')
@section('backend_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('backend/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('backend/content') }}">Content</a></li>
		<li class="active"><a>Edit Content</a></li>
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
			<i class="fa fa-pencil" style="margin-top: 5px;"></i>&nbsp;<b><i>Edit Data</i></b>
		</div>
		<div class="panel-body">
			{{ Form::model($list_data, array('route' => array('backend/content/edit', $list_data->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="form-group">
				<label>title :</label>
				{{ Form::text('title' , $list_data->title, array('class'=>'form-control')) }}
				@if($errors->has('title'))
				<span style="color:red">{{ $errors->first('title') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>sub title :</label>
				{{ Form::text('subtitle' , $list_data->subtitle, array('class'=>'form-control')) }}
				@if($errors->has('subtitle'))
				<span style="color:red">{{ $errors->first('subtitle') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Description :</label>
				{{ Form::textarea('description' , $list_data->description, array('class'=>'form-control')) }}
				@if($errors->has('description'))
				<span style="color:red">{{ $errors->first('description') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label>category :</label>
				{{ Form::select('category', $category, $list_data->category,array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>Cover content (Image) :</label>
				<input type="file" name="file" id="pick_file" />
				@if($errors->has('file'))
				<span style="color:red">{{ $errors->first('file') }}</span>
				@endif
			</div>
			<div>
				<?php if ($list_data->image !=""): ?>
					<img src="{{asset('resources/assets/image/landing_page')}}/{{$list_data->id}}/{{$list_data->image}}" id="show_file" style="height:150px;width:150px;">
				<?php else: ?>
					<img src="{{asset('resources/assets/image')}}/no_photo.png" id="show_file" style="height:150px;width:150px;">
				<?php endif ?>
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
