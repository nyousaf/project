@extends('layouts.theme')
@section('main-content') 
<!--  section -->
<section id="login-section" class="login-main-block" style="background-image: url({{asset('images/slider-01.jpg')}})">
	<div class="container">
		<div class="row">
			<div class="offset-lg-3 col-lg-6">
				
				
				<!-- Login Form Start-->
				<div class="login-register-form">
				@if(Session::has('success'))
					  <div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					    {{Session::get('success')}}
					  </div>
				  @endif								
					<div class="section text-center">
			      <h3 class="section-heading">Login Now</h3>
			      <p>Please Login To Your Account</p>
			      
			    </div> 
					<!-- Form Start--> 
          <form method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Email']) !!}
              <small class="text-danger">{{ $errors->first('email') }}</small>
          	</div>
          	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password']) !!}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          	</div>
			<div class="forgot-block"><a href="{{ route('password.request') }}">Forgot Your Password?</a></div>
            <br>
            <button type="submit" class="btn btn-outline-success login-btn btn-md btn-block">Login Now</button>
            <br>
             @php
            $fb_status = App\Settings::select('fb_login')->where('id','=',1)->first();
            $g_status = App\Settings::select('google_login')->where('id','=',1)->first();
            $gitlab_status = App\Settings::select('gitlab_login')->where('id','=',1)->first();
          @endphp
	      		 @if($fb_status->fb_login == 1)
	      		<a  href="{{ route('sociallogin','facebook') }}"  type="button" class="btn btn-info fb-btn btn-md" title="Register With Facebook"><i class="fa fa-facebook"></i>Facebook</a>
	      		  @endif
	      		    @if($g_status->google_login == 1)
	      		<a  href="{{ route('sociallogin','google') }}"  type="button" class="btn btn-danger gplus-btn btn-md" title="Register With Google"><i class="fa fa-google"></i>Google</a>
                   @endif
                    @if($gitlab_status->gitlab_login == 1)
                  <a href="{{ route('sociallogin','gitlab') }}" type="button" class="btn btn-md btn-gitlab btn-default">
                   <i class="fa fa-gitlab"></i>Gitlab
                    </a>

           @endif
           
           
    			</form>      
        </div>
					<!-- Form End-->
			</div>
		</div>
	</div>
</section>
@endsection
