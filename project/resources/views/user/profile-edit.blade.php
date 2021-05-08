@extends('layouts.theme')
@section('main-content')
<!-- section -->
<section id="page-section" class="page-main-block profile-edit">
  <div class="container">               
    <div class="row">
    	<div class="col-sm-3">
    		<div class="main-block-sidenav">
    		   @include('includes.user-tabs')
    		</div>
    	</div>
    	
			<div class="col-sm-9">
				<div class="page-content">
          <h3 class="page-heading">Edit Profile</h3>
          		@if ($errors->has('old_password'))
										<span class="help-block">
											<strong>{{ $errors->first('old_password') }}</strong>
										</span>
				@endif
				@if ($errors->has('password'))
												<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
				@endif

					{!! Form::model($auth, ['method' => 'PATCH','action' => ['UserDashboardController@profile_update', $auth->id], 'files' => true, 'class' => 'profile-form']) !!}
						{{ csrf_field() }}
      			<div class="row">
      				<div class="col-md-6">
      					
				               <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
						            {!! Form::label('image', 'User Image') !!}
						            {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
						            <small class="text-danger">{{ $errors->first('image') }}</small>
		                        </div> 
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									{!! Form::label('name', 'User Name*') !!}
									{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div> 
								@if(str_is('*@facebook.com', $auth->email) || str_is('*@google.com', $auth->email))
    							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    								{!! Form::label('email', 'Email Address*') !!}
    								{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    								<small class="text-danger">{{ $errors->first('email') }}</small>
    							</div> 
    						@else
        					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    								{!! Form::label('email', 'Email Address*') !!}
    								{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    								<small class="text-danger">{{ $errors->first('email') }}</small>
    							</div> 
    						@endif	
    						<div class="form-group{{ $errors->has('paypal_id') ? ' has-error' : '' }}">
									{!! Form::label('paypal_id', 'Paypal Me Link') !!}
									{!! Form::url('paypal_id',$auth->socials ? $auth->socials->paypal_id : null, ['class' => 'form-control','placeholder' => 'https://www.paypal.me/clickstocks']) !!}
									<small class="text-danger">{{ $errors->first('paypal_id') }}</small>
								<small>Create A Paypal.Me Link and Paste Here! <a target="_blank" style="color:coral;" href="https://www.paypal.me/">What is Paypal Me Link?</a></small>

								</div>
								<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
									{!! Form::label('gender', 'Choose Your Gender') !!}
									{!! Form::select('gender', ['m' => 'Male', 'f' => 'Female'], null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('gender') }}</small>
								</div> 
								<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
									{!! Form::label('mobile', 'Mobile Number') !!}
									{!! Form::text('mobile', null, ['class' => 'form-control', 'required']) !!}
									<small class="text-danger">{{ $errors->first('mobile') }}</small>
								</div>
								<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
									{!! Form::label('dob', 'Date of Birth*') !!}
									{!! Form::date('dob', null, ['class' => 'form-control date-picker', 'required']) !!}
									<small class="text-danger">{{ $errors->first('dob') }}</small>
								</div> 
								<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
									{!! Form::label('address', 'Your Address') !!}
									{!! Form::textarea('address', null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('address') }}</small>
								</div> 
								<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
									{!! Form::label('	city', 'City*') !!}
									{!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
									<small class="text-danger">{{ $errors->first('city') }}</small>
								</div>
								<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
									{!! Form::label('state', 'State*') !!}
									{!! Form::text('state', null, ['class' => 'form-control', 'required']) !!}
									<small class="text-danger">{{ $errors->first('state') }}</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
									{!! Form::label('country', 'Country*') !!}
									{!! Form::text('country', null, ['class' => 'form-control', 'required']) !!}
									<small class="text-danger">{{ $errors->first('country') }}</small>
								</div>
								<div class="form-group{{ $errors->has('fb_url') ? ' has-error' : '' }}">
									{!! Form::label('fb_url', 'Facebook Link') !!}
									{!! Form::text('fb_url', $auth->socials ? $auth->socials->fb_url : null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('fb_url') }}</small>
								</div>
								<div class="form-group{{ $errors->has('twi_url') ? ' has-error' : '' }}">
									{!! Form::label('twi_url', 'Twitter Link') !!}
									{!! Form::text('twi_url', $auth->socials ? $auth->socials->twi_url : null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('twi_url') }}</small>
								</div>
								<div class="form-group{{ $errors->has('g_url') ? ' has-error' : '' }}">
									{!! Form::label('g_url', 'Google Plus Link') !!}
									{!! Form::text('g_url', $auth->socials ? $auth->socials->g_url : null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('g_url') }}</small>
								</div>
								
								<div class="form-group{{ $errors->has('link_url') ? ' has-error' : '' }}">
									{!! Form::label('link_url', 'Linkedin Link') !!}
									{!! Form::text('link_url', $auth->socials ? $auth->socials->link_url : null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('link_url') }}</small>
								</div>
								<div class="form-group{{ $errors->has('insta_url') ? ' has-error' : '' }}">
									{!! Form::label('insta_url', 'Instagram Link') !!}
									{!! Form::text('insta_url', $auth->socials ? $auth->socials->insta_url : null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('insta_url') }}</small>
								</div>
								<div class="form-group{{ $errors->has('pin_url') ? ' has-error' : '' }}">
									{!! Form::label('pin_url', 'Pinterest Link') !!}
									{!! Form::text('pin_url', $auth->socials ? $auth->socials->pin_url : null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('pin_url') }}</small>
								</div>
								<div class="form-group{{ $errors->has('brief') ? ' has-error' : '' }}">
									{!! Form::label('brief', 'About you') !!}
									{!! Form::textarea('brief', null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('brief') }}</small>
								</div> 
								<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
									{!! Form::label('website', 'Website Optional') !!}
									{!! Form::text('website', null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('website') }}</small>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" class="btn btn-success btn-block">Submit</button>
							</div>
						</div>
					{!! Form::close() !!}
					<div class="form-group text-center">
					  <a style="color:coral;" data-toggle="collapse" href="#changePassword" role="button" aria-expanded="false" aria-controls="changePassword">
				    	Want to change your password?
			  	  </a>
					</div> 
					<div class="collapse" id="changePassword">
          	<h3>Change Password</h3>
						{!! Form::model($auth, ['method' => 'POST','action' => ['UserDashboardController@change_password', $auth->id], 'class' => 'submit-deal-form  contact-form']) !!}
					 		{{ csrf_field() }}
					 		<div class="row">
							  <div class="col-md-6 form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
									<label for="old_password">Enter Old Password</label>
									<input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" required>
								{{-- validation --}}
								</div>
								<div class="col-md-6 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password">Enter New Password</label>
									<input type="password" name="password" class="form-control" placeholder="Enter New Password" required>
								{{-- validation --}}
								</div>
								<div class="col-md-6 form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
									<label for="password_confirmation">Confirm New Password</label>
									<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required>
									@if ($errors->has('password_confirmation'))
										<span class="help-block">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
									@endif
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						{!! Form::close() !!} 
					</div> 	
				</div>
		  </div>
		</div>
	</div>
</section>
<!-- end forum -->
@endsection