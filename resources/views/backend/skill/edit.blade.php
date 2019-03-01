@extends('backend_layout')
@section('backend_content')
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('backend/dashboard')}}">Dashboard</a></li>
		<li ><a href="{{ route('backend/skill') }}">Skill</a></li>
		<li class="active"><a>Edit Skill</a></li>
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
			{{ Form::model($list_data, array('route' => array('backend/skill/edit', $list_data->id), 'method' => 'PUT','files'=>true)) }}
			<div class="form-group">
				<label>title :</label>
				{{ Form::text('title' , $list_data->title, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<label>percentage :</label>
				<input type="range" min="1" max="100" value="{{$list_data->percentage}}" data-rangeslider name="percentage">
				<output></output>
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
