@extends('frontend_layout')
@section('content')
<div id="home" class="banner">
	<div class="banner-info">
		<div class="container">
			<div class="col-md-4 header-left">
				<img src="{{asset('resources/assets/image')}}/{{ $data_profile->avatar }}" alt=""/>
			</div>
			<div class="col-md-8 header-right about-right">
				<ul class="address">
					<h2>Nice To Meet You</h2>
					<h1>I am {{ $data_profile->name }}</h1>
					<h6>Developer</h6>
					<li><h4><span class="glyphicon glyphicon-menu-right"> <b>Phone : </b>{{ $data_profile->phone }}</h4></li>
					<li><h4><span class="glyphicon glyphicon-menu-right"> <b>Email : </b>{{ $data_profile->email }}</h4></li>
					<li><h4><span class="glyphicon glyphicon-menu-right"> <b>Addess : </b>{{ $data_profile->address }}</h4></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>
<div class="top-nav wow">
	<div class="container">
		<div class="navbar-header logo">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				Menu
			</button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="menu">
				<ul class="nav navbar">
					<li><a href="{{route('/')}}#skills" class="scroll">Skills</a></li>
					<li><a href="{{route('/')}}#education" class="scroll">Education</a></li>
					<li><a href="{{route('/')}}#work" class="scroll">Experience</a></li>
					<li><a href="{{route('/')}}#projects" class="scroll">My Projects</a></li>
					<li><a href="{{route('/')}}#awards" class="scroll">Awards</a></li>
					<li><a href="{{route('/')}}#contact" class="scroll">Contact</a></li>
				</ul>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>	
<div id="skills" class="skills">
	<div class="container">
		<h3 class="title">Skills</h3>
		<div class="skills-info">

			@if($data_skill->count())
			<?php 
			foreach($data_skill as $key=>$value)
			{
				echo '
				<div class="skill-item">
				<h6>'.$value['title'].' <span> '.$value['percentage'].'% </span></h6>
				<div class="progress">
					<div class="progress-bar progress-bar-striped active" style="width: '.$value['percentage'].'%">
					</div>
				</div>
				</div>
				';
			}
			?>  
			@else
			<div align="center" style="color:white"><b>Im Still Learning</b></div>
			@endif

			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<div id="education" class="education">
	<div class="container">
		<h3 class="title">Education</h3>
		@if($data_education->count())
		<?php 
		foreach($data_education as $key=>$value)
		{
			if ($key % 2 == 0) 
			{
				echo '
				<div class="work-info"> 
					<div class="col-md-6 work-left"> 
						<h4>'.$value['title'].'</h4>
					</div>
					<div class="col-md-6 work-right"> 
						<h5><span class="glyphicon glyphicon-education"> </span> '.$value['subtitle'].'</h5>
						<p>
							'.$value['description'].'
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>';

			}
			else
			{
				echo '
				<div class="work-info"> 
					<div class="col-md-6 work-right work-right2"> 
						<h4>'.$value['title'].' </h4>
					</div>
					<div class="col-md-6 work-left work-left2"> 
						<h5> '.$value['subtitle'].' <span class="glyphicon glyphicon-briefcase"></span> </h5>
						<p>
							'.$value['description'].'
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>';
			}
		}
		?>
		@else
		<div align="center"><b>Still Looking For An Award</b></div>
		@endif
	</div>
</div>

<div id="work" class="work">
	<div class="container">
		<h3 class="title">Work Experience</h3>
		@if($data_experience->count())
		<?php 
		foreach($data_experience as $key=>$value)
		{
			if ($key % 2 == 0) 
			{
				echo '
				<div class="work-info"> 
					<div class="col-md-6 work-left"> 
						<h4>'.$value['title'].'</h4>
					</div>
					<div class="col-md-6 work-right"> 
						<h5><span class="glyphicon glyphicon-education"> </span> '.$value['subtitle'].'</h5>
						<p>
							'.$value['description'].'
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>';

			}
			else
			{
				echo '
				<div class="work-info"> 
					<div class="col-md-6 work-right work-right2"> 
						<h4>'.$value['title'].' </h4>
					</div>
					<div class="col-md-6 work-left work-left2"> 
						<h5> '.$value['subtitle'].' <span class="glyphicon glyphicon-briefcase"></span> </h5>
						<p>
							'.$value['description'].'
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>';
			}
		}
		?>
		@else
		<div align="center" style="color:white"><b>Still Looking For An Experience</b></div>
		@endif
	</div>
</div>

<div id="projects" class="portfolio">
	<div class="container">
		<h3 class="title wow zoomInLeft animated" data-wow-delay=".5s">My Projects</h3>
		<div class="sap_tabs">			
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list wow fadeInUp animated" data-wow-delay=".7s">
					<li class="resp-tab-item"><span>Project</span></li>
					<li class="resp-tab-item"><span>Teamwork</span></li>					
				</ul>	
				<div class="clearfix"> </div>	
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content">
						@if($data_gallery_project != "")
						@foreach($data_gallery_project as $data)
						<div class="tab_img">
							<div class="col-md-4 portfolio-grids">
								<div class="grid">
									<a href="{{asset('resources/assets/image/landing_page')}}/{{ $data->id }}/{{ $data->image }}" class="swipebox" title="<h4 style='color:#1a2522'><b>{{ $data->description }} </br>Press Esc To Exit</b></>">
										<img src="{{asset('resources/assets/image/landing_page')}}/{{$data->id}}/{{ $data->image }}" alt="" class="img-responsive" />
										<div class="figcaption">
											<h3><span> {{ $data->title }}</span></h3>
											<p>{{ $data->subtitle }}.</p>
										</div>
									</a>	
								</div>
							</div>
						</div>
						@endforeach
						@endif
						<div class="clearfix"> </div>
					</div>
					<div class="tab-1 resp-tab-content">
						@if($data_gallery_teamwork != "")
						@foreach($data_gallery_teamwork as $data)
						<div class="tab_img">
							<div class="col-md-4 portfolio-grids">
								<div class="grid">
									<a href="{{asset('resources/assets/image/landing_page')}}/{{ $data->id }}/{{ $data->image }}" class="swipebox" title="<h4 style='color:#1a2522'><b>{{ $data->description }} </br>Press Esc To Exit</b></>">
										<img src="{{asset('resources/assets/image/landing_page')}}/{{$data->id}}/{{ $data->image }}" alt="" class="img-responsive" />
										<div class="figcaption">
											<h3><span> {{ $data->title }}</span></h3>
											<p>{{ $data->subtitle }}.</p>
										</div>
									</a>	
								</div>
							</div>
						</div>
						@endforeach
						@endif
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="awards" class="education">
	<div class="container">
		<h3 class="title">Awards</h3>
		@if($data_award->count())
		<?php 
		foreach($data_award as $key=>$value)
		{
			if ($key % 2 == 0) 
			{
				echo '
				<div class="work-info"> 
					<div class="col-md-6 work-left"> 
						<h4>'.$value['title'].'</h4>
					</div>
					<div class="col-md-6 work-right"> 
						<h5><span class="glyphicon glyphicon-education"> </span> '.$value['subtitle'].'</h5>
						<p>
							'.$value['description'].'
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>';

			}
			else
			{
				echo '
				<div class="work-info"> 
					<div class="col-md-6 work-right work-right2"> 
						<h4>'.$value['title'].' </h4>
					</div>
					<div class="col-md-6 work-left work-left2"> 
						<h5> '.$value['subtitle'].' <span class="glyphicon glyphicon-briefcase"></span> </h5>
						<p>
							'.$value['description'].'
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>';
			}
		}
		?>
		@else
		<div align="center"><b>Still Looking For An Award</b></div>
		@endif
	</div>
</div>

<div class="welcome contact" id="contact">
	<div class="container">
		<h3 class="title">Contact Us</h3>
		<div class="col-md-12" style="padding-bottom:15px;" align="center">
			@if(Session::has('message'))
			<b style="color:#779433">{{ Session::get('message') }}</b>
			@endif
		</div>
		<div class="contact-row">
			<div class="col-md-6 contact-left">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19647.30553669021!2d106.95384987825678!3d-6.915585539294343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6849a97a5d39bb%3A0xf7cb9bbc7b8b485d!2sSDN+Cidadap+3!5e0!3m2!1sid!2sid!4v1467261469300" width="600" height="477" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-md-6 contact-right">
				<div class="address-left">
					<p>Adress :  Kp. cidadap rt 003/002 </p>
					<p>Village :  Limbangan </p>
					<p>Districts : Sukaraja -Sukabumi</a></p>
					<p>Post Code : 43192</a></p>
				</div>
				<div class="address-right">
					<p>Phone :  +62 858 6262 4149</p>
					<p>E-mail : <a href="mailto:info@example.com">israj.haliri@gmail.com</a></p>
				</div>
				<div class="clearfix"></div>
				<div class="contact-form">
					{{ Form::open(array('route' => 'contact_us')) }}
					<input class="phone" name="name" type="text" placeholder="admin" required>
					@if($errors->has('email'))
					<b style="color:#779433">{{ $errors->first('email') }}</b>
					@endif
					<input class="phone" name="email" type="text" placeholder="admin@mail.com" required>
					<input class="phone" name="subject" type="text" placeholder="meeting" required>
					<textarea name="message" placeholder="Message" required></textarea>
					<input type="submit" value="SUBMIT" >
					{{ Form::close() }}
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<p>© 2016 Israj Alwan Haliri. All rights reserved | Design by nice company</p>
	</div>
</div>
@stop