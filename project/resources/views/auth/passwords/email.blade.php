@extends('layouts.theme')
@section('main-content') <!--Sub Banner Wrap End-->
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url({{asset('images/banner.jpg')}})">    <div class="overlay-bg"></div>
	<div class="container">
		<div class="banner-block">
			<h2 class="banner-heading">Login</h2>
			<ol class="breadcrumb">
				<li><a href="{{asset('/')}}">Home</a></li>
				<li class="active">Reset Password</li>
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
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif
					<form method="POST" action="{{ route('password.email') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="control-label">E-Mail Address</label>
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="help-block">
									{{ $errors->first('email') }}
								</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Send Password Reset Link
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
