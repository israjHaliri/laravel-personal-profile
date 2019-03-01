@extends('backend_layout')
@section('backend_content')
<link href="{{ asset('resources/assets/css/backend/custom_content.css') }}" rel="stylesheet">
<div class="col-md-12" align="center">
	@if(Session::has('message'))
	{{ Session::get('message') }}
	@endif
</div>
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href="{{ route('backend/dashboard')}}">Dashboard</a></li>
		<li class="active"><a>List Content</a></li>
	</ul>
</div>
<div class="col-md-12" align="right">
	{{ Form::open(array('route' => 'backend/content','method' => 'GET')) }}
	<div class="input-group">
		{{ Form::text('search' , '', array('class'=>'form-control', 'placeholder'=>'Type Keywords.....')) }}
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i></button>
		</span>
	</div>
	{{ Form::close() }}
</div>
@if($list_data->count())
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<i class="fa fa-list" style="margin-top: 5px;"></i>&nbsp;<b><i>Add Data</i></b>
				</div>
				<div class="col-md-6" align="right">
					<a href="{{ route('backend/content/create') }}" style="margin-bottom: 0px;" class="btn btn-xs btn-primary"><em class="fa fa-plus"></em>&nbsp;Add</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<table class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Title</th>
							<th>Sub Title</th>
							<th>Category</th>
							<th width="20%"><em class="fa fa-cog"></em></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						@foreach($list_data as $data)
						<tr>					
							<td align="center"><?= $no++ ?></td>
							<td>{{ $data->title }}</td>
							<td>{{ $data->subtitle }}</td>
							<td>
								<?php if ($data->category == 1): ?>
									Education
								<?php elseif ($data->category == 2): ?>
									Work Experience
								<?php elseif ($data->category == 3): ?>
									Awards
								<?php elseif ($data->category == 4): ?>
									Testimonial Project
								<?php elseif ($data->category == 5): ?>
									Testimonial Teamwork
								<?php else: ?>
									Testimonial Teamwork
								<?php endif ?>
							</td>
							<td align="center">
								<a class="btn btn-success" href="{{ route('backend/content/edit', $data->id) }}"><em class="fa fa-pencil"></em></a>
								<a class="btn btn-danger" href="{{ route('backend/content/delete', $data->id) }}"><em class="fa fa-trash"></em></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-12" align="center">
				{!! $list_data->render() !!}
			</div>
		</div>
	</div>
</div>
@else
<div class="col-md-12">
	<div class="alert alert-warning" role="alert">No Data</div>
</div>
@endif
@stop