<div class="acc-block">
	<div class="row">
		<div class="col-sm-12">
			<div class="acc-img">
				
				<img src="{{asset('images/user/'.$auth->image)}}" alt="User" class="img-fluid">

			</div>
		</div>
		<div class="col-sm-12">
			<div class="acc-dtl text-center">		    
				<p class="user-name">{{$auth->name}}</p>			
			</div>
		</div>
	</div>
  <div class="sidenav">
		<ul>
			<li><a href="{{url('user/account')}}" class="{{ Nav::urlDoesContain('user/account') }}" title="My Account">My Account</a></li>
			@if(Auth::user()->is_admin == 1)
		            		<li> <a target="_blank" href="{{ url('admin') }}">Admin Dashboard</a></li>
		            		@endif
			<li><a href="{{url('user/profile-edit')}}" class="{{ Nav::urlDoesContain('user/profile-edit') }}" title="Edit Profile">Edit Profile</a></li>
			<li><a href="{{route('upload.create')}}" title="Add Photo">Submit Photo</a></li>
			<li><a href="{{url('user/my-photo')}}" class="{{ Nav::urlDoesContain('user/my-photo') }}" title="My photos">My Photos</a></li>
			<li><a href="{{url('user/my-collection')}}" class="{{ Nav::urlDoesContain('user/my-collection') }}" title="My collection">My Collection</a></li>
			<li><a href="{{url('user/followers')}}" class="{{ Nav::urlDoesContain('user/followers') }}" title="My Followers">My Followers</a></li>
			<li><a href="{{url('user/followings')}}" class="{{ Nav::urlDoesContain('user/followings') }}" title="My Followings">My Followings</a></li>
		</ul>
	</div>	
</div>