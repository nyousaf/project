@extends('layouts.theme')
@section('main-content') 
<!--Section-->
<section id="login-section" class="login-main-block" style="background-image: url({{asset('images/slider-01.jpg')}})">
	<div class="container">
		<div class="row">
			<div class="offset-lg-3 col-lg-6">
				<!-- Login Form Start-->
				<div class="login-register-form">								
					<div class="section text-center">
			      <h3 class="section-heading">Register Now</h3>
			      <p>Explore Unlimited Images</p>
			    </div> 
					<!-- Form Start--> 
					<form method="POST" action="{{ route('register') }}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name*" required autofocus>
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<input id="email" type="email" class="form-control" name="email" placeholder="Email*" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif	
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<input id="password" type="password" class="form-control" name="password" placeholder="Password*" required>
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif	
						</div>
						<div class="form-group">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password*" required>
						</div>
						 @php
            $fb_status = App\Settings::select('fb_login')->where('id','=',1)->first();
            $g_status = App\Settings::select('google_login')->where('id','=',1)->first();
            $gitlab_status = App\Settings::select('gitlab_login')->where('id','=',1)->first();
          @endphp
            <button type="submit" class="btn btn-outline-success btn-md btn-block login-btn">Register Now</button><br>
	      		
	      		 @if($fb_status->fb_login == 1)
	      		<a  href="{{ route('sociallogin','facebook') }}"  type="button" class="btn btn-info fb-btn btn-md" title="Register With Facebook"><i class="fa fa-facebook"></i>Facebook</a>
	      		  @endif
	      		    @if($g_status->google_login == 1)
	      		<a  href="{{ route('sociallogin','google') }}"  type="button" class="btn btn-danger gplus-btn btn-md" title="Register With Google"><i class="fa fa-google"></i>Google</a>
                   @endif
                    @if($gitlab_status->gitlab_login == 1)
                  <a  href="{{ route('sociallogin','gitlab') }}" type="button" class="btn btn-md btn-gitlab btn-default">
                   <i class="fa fa-gitlab"></i>Gitlab
                    </a>

           @endif
           
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
