@extends('layouts.theme')
@section('main-content') <!--Sub Banner Wrap End-->
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url({{asset('images/banner.jpg')}})">    <div class="overlay-bg"></div>
	<div class="container">
		<div class="banner-block">
			<h2 class="banner-heading">Reset Password</h2>
			<ol class="breadcrumb">
				<li><a href="{{asset('/')}}">Home</a></li>
				<li class="active">Reset Pasword</li>
			</ol>
		</div>
	</div>
</section>
<section id="login-section" class="login-main-block">
	<div class="container">
		<div class="row">
			<div class="offset-lg-3 col-lg-6">
				<!-- Login Form Start-->
				<div class="login-register-form">                               
					<div class="section text-center">
					  <h3 class="section-heading">Reset Password</h3>
					</div> 
					<form method="POST" action="{{ route('password.request') }}">
						{{ csrf_field() }}
						<input type="hidden" name="token" value="{{ $token }}">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="control-label">E-Mail Address</label>
							<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="control-label">Password</label>
							<input id="password" type="password" class="form-control" name="password" required>
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							@if ($errors->has('password_confirmation'))
								<span class="help-block">
									<strong>{{ $errors->first('password_confirmation') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Reset Password
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
