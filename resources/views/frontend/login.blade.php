@extends('frontend_layout')
@section('include_css_content')
<link href="{{ asset('resources/assets/css/frontend/login.css') }}" rel="stylesheet">
@stop
@section('content')
<section class="sec-login" style="margin-bottom:300px">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap">
				<p class="form-title">Sign In</p>
				<div class="col-md-12" align="center">
					@if(Session::has('message'))
					<b style="color:#779433">{{ Session::get('message') }}</b>
					@endif
				</div>

				{{ Form::open(array('route' => 'login/auth','class' => 'login')) }}

				{{ Form::text('email' , '', array('class'=>'form-control', 'placeholder'=>'admin@mail.com')) }}
				@if($errors->has('email'))
				<b style="color:#779433">{{ $errors->first('email') }}</b>
				@endif

				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'*************')) }}
				@if($errors->has('password'))
				<b style="color:#779433">{{ $errors->first('password') }}</b>
				@endif

				{{ Form::submit('Login', array('class'=>'btn btn-success')) }}

				<div class="remember-forgot">
					<div class="row">
						<div class="col-md-6">
							<div class="checkbox">
								<label>
									{{ Form::checkbox('remember_me', '1',false, array('id'=>'remember_me')) }} Remember me
								</label>
							</div>
						</div>
						<div class="col-md-6 forgot-pass-content">
							<a href="{{ route('/') }}" class="forgot-pass">Back To Home</a>
						</div>
					</div>
				</div>
				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>
</section>
@stop