@extends('layouts.admin')
@section('content')



<div class="dashboard-block">
<br>
<br>
    <h4>Edit Page: {{ $user->name }}</h4>
      <img class="img-rounded" src="{{ asset('images/user/'.$user->image)}}" height="150px" width="200px">
    <hr>
  
    
    <form class="col-md-8" action="{{ route('tax.update',$user->id) }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <label for="name">Name:</label>
      <input required type="text" value="{{ $user->name }}" name="name" class="form-control">
      <br>
      <label for="name">Address:</label>
      <input  type="text" value="{{ $user->address }}" name="address" class="form-control">
  	   <br>
  	   <label for="name">Email:</label>
      <input required type="email" value="{{ $user->email }}" name="email" class="form-control">
      <br>
        <label for="name">Paypal.Me Link:</label>
      <input type="url" value="{{$paypalid}}" name="paypal_id" class="form-control">
      <p style="font-size: 15px;">Ask User to create A Paypal.Me Link! <a target="_blank" style="color:coral;" href="https://www.paypal.me/">What is Paypal Me Link?</a></p>
      <br>
      <label for="name">Mobile:</label>
      <input  type="text" value="{{ $user->mobile }}" name="mobile" class="form-control">
      <br>
      <label for="name">DOB:</label>
      <input  type="date" value="{{ $user->dob }}" name="dob" class="form-control">
      <br>
      <label for="name">Gender:</label>
                @if($user->sex=='m')
                  <select class="form-control" name="sex">
                  <option  selected value="m">Male</option>
                  <option value="f">Female</option>
                </select>
                @else

                  <select class="form-control" name="sex">
                  <option value="m">Male</option>
                  <option  selected value="f">Female</option>
                </select>

                @endif

      <br>
      <label for="name">image:</label>

      <input type="file" value="{{$user->image }}" name="image" class="form-control">
      <br>
      <label for="name">Change Password:</label>
      <input type="Password" value="" name="Password" class="form-control">
      <br>
      <label for="name">City :</label>
      <input type="text" name="city" value="{{$user->city }}" class="form-control">
      <br>
      <label for="name">State :</label>
      <input type="text" name="state" value="{{$user->state }}" class="form-control">
      <br>
      <label for="name">Country :</label>
      <input type="text" name="country" value="{{$user->country }}" class="form-control">
      <br>
      @if($user->suspended=='0')
       <div class="form-group{{ $errors->has('suspended') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-2">
                {!! Form::label('suspended', 'suspend Account') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('suspended', 1, 0, ['class' => 'checkbox-switch']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('suspended') }}</small>
            </div>
          </div>  
          @else
           <div class="form-group{{ $errors->has('suspended') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-2">
                {!! Form::label('suspended', 'Account Suspended') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('suspended', 1, 1, ['class' => 'checkbox-switch']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('suspended') }}</small>
            </div>
          </div>          
      @endif
<br>
      <input type="submit" value="Update" class="btn btn-success btn-md">
    </form>



  </div>
@endsection