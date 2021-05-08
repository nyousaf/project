@extends('layouts.theme')
@section('main-content')
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url({{asset('images/banner.jpg')}})">    <div class="overlay-bg"></div>
    <div class="container">
      <div class="banner-block">
          <h2 class="banner-heading"></h2>
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Error</li>
          </ol>
      </div>
    </div>
</section>
<!--  end page banner -->
<!-- about -->
<section id="about-section" class="about-main-block">
  <div class="container text-center">
    <div class="error-page">
        <div class="error-text">
            <h1 class="error-heading">404</h1>
            <h3>Sorry! Page Not Found !</h3>
            {{-- <p>Please go back to home page or search for other terms.</p> --}}
            <a href="{{url('/')}}" title="trevelinn" class="btn btn-primary">Go Back To Home Page</a>
        </div>
    </div>
    <!-- Error Page End-->
</div>
</div>
@endsection