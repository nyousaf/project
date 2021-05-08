@extends('layouts.theme')
@section('main-content')
<!-- Section -->
<section id="page-section" class="page-main-block account-page">
  <div class="container">               
    <div class="row">
    	<div class="col-md-3">
        <div class="main-block-sidenav">
           @include('includes.user-tabs')
        </div>
    	</div>
			<div class="col-md-9">
				{{-- <h3>My Account</h3> --}}
				<div class="dashboard-main-block">
          <div class="profile-block text-center">
            <h2 class="profile-username">{{$auth->name}}</h2>
            <div class="post">{{$auth->is_admin == '1' ? 'Administrator' : 'User'}}</div>
            <div class="join-date">Joined on {{$auth->created_at->format('jS F, Y')}}</div>
            <div class="holder-info">
              <p>{{$auth->brief}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4"> 
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-image"></i></div>
                <div class="dash-item-name">Photos</div>
                <div class="dash-item-title">{{$auth->works->count()}}</div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-folder"></i></div>
                <div class="dash-item-name">Collection</div>
                <div class="dash-item-title">{{$auth->user_favorites->count()}}</div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-users"></i></div>
                <div class="dash-item-name">Followers</div>
                <div class="dash-item-title">{{$auth->followers->count()}}</div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-users"></i></div>
                <div class="dash-item-name">Following</div>
                <div class="dash-item-title">{{$auth->followings->count()}}</div>
              </div>
            </div>
          </div>
        </div>
			</div>
		</div> 
	</div>
</section>
@endsection