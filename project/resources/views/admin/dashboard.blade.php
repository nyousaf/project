@extends('layouts.admin', [
  'page_header' => 'Admin'
])

@section('content')
  <div class="content-main-block mrg-t-40">
  	<h4 class="admin-form-text">Dashboard</h4>
    <div class="row">
    	<div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="{{url('admin/category')}}" class="small-box z-depth-1 hoverable bg-aqua default-color">
          <div class="inner">
            <h3>{{$cat_count}}</h3>
            <p>Total Category</p>
          </div>
          <div class="icon">
            <i class="material-icons">device_hub</i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="{{route('photos.index')}}" class="small-box z-depth-1 hoverable bg-red danger-color">
          <div class="inner">
            <h3>{{$prod_count}}</h3>
            <p>Total Photos</p>
          </div>
          <div class="icon">
            <i class="material-icons">color_lens</i>
          </div>
        </a>
      </div>      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="{{route('pend.pho')}}" class="small-box z-depth-1 hoverable bg-purple">
          <div class="inner">
            @php
              $approves = App\Work::where('status', '=', 2)->get();
            @endphp
            <h3>{{$approves->count()}}</h3>
            <p>Total Approval</p>
          </div>
          <div class="icon">
            <i class="material-icons">turned_in</i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="{{url('admin/user_form')}}" class="small-box z-depth-1 hoverable bg-red warning-color">
          <div class="inner">
            @php
              $users = App\users::all();
            @endphp
            <h3>{{$users->count()}}</h3>
            <p>Total User</p>
          </div>
          <div class="icon">
            <i class="material-icons">grade</i>
          </div>
        </a>
      </div>
    </div>
  </div>
@endsection
