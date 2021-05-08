@extends('layouts.theme')
@section('main-content')
<!-- section -->
<section id="page-section" class="page-main-block followings-page">
  <div class="container">               
    <div class="row">
      <div class="col-md-3">
        <div class="main-block-sidenav">
           @include('includes.user-tabs')
        </div>
      </div>
      <div class="col-md-9">
        <div class="page-content">
          <h3 class="page-heading">My Followers</h3>
          <div class="row">
            @if(isset($auth->followings))
              @foreach($auth->followings as $item)
                <div class="col-xs-1">
                  <div class="profile-img">
                    <a href="{{url('profile/'.$item->uni_id.'/'.str_slug($item->name,'-'))}}" title="{{$item->name}}"><img src="{{asset('images/user/'.$item->image)}}" class="img-fluid" alt="User">                      
                      <div class="dash-username">{{$item->name}}</div>
                    </a>
                  </div>
                </div>
              @endforeach       
            @else 
              <div class="no-block">No Followings Yet</div>
            @endif
        </div>
      </div> 
    </div> 
  </div>
</section>
@endsection