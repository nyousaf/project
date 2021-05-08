@extends('layouts.admin')

@section('content')
  <div class="admin-form-main-block mrg-t-40">
      
       
      {!! Form::model($ad_settings, ['method' => 'PATCH', 'action' => ['AdsettingController@ad_update']]) !!}

   
         <div class="row admin-form-block z-depth-1">
          <div class="col-md-8">  
            <h6 class="admin-form-text" style="margin-bottom: 20px;">Shutterstock Ad Settings</h6>
 <div class="form-group{{ $errors->has('Embedd_code') ? ' has-error' : '' }}">
                {!! Form::label('Embedd_code', 'Ad widget Id') !!}
                <p class="inline info"> - Please Enter Your Shutterstock Embedd Code</p>
                {!! Form::text('Embedd_code', null, ['class' => 'form-control', 'placeholder' => '5d3c43f74e0abc570b092c62']) !!}
                <small class="text-danger">{{ $errors->first('Embedd_code') }}</small>
            </div>
        
            
 <div class="form-group{{ $errors->has('image_flag') ? ' has-error' : '' }} switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  {!! Form::label('image_flag', 'Show Ad on Images Page') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    {!! Form::checkbox('image_flag', 1, null, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('image_flag') }}</small>
              </div>
            </div>

<div class="form-group{{ $errors->has('catagory_flag') ? ' has-error' : '' }} switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  {!! Form::label('catagory_flag', 'Show Ad on Category Page') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    {!! Form::checkbox('catagory_flag', 1, null, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('catagory_flag') }}</small>
              </div>
            </div>
            <div class="form-group{{ $errors->has('search_flag') ? ' has-error' : '' }} switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  {!! Form::label('search_flag', 'Show Ad on Search Page') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    {!! Form::checkbox('search_flag', 1, null, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('search_flag') }}</small>
              </div>
            </div>
<div class="form-group{{ $errors->has('home_flag') ? ' has-error' : '' }} switch-main-block">
              <div class="row">
                <div class="col-xs-4">
                  {!! Form::label('home_flag', 'Show Ad on Home Page') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    {!! Form::checkbox('home_flag', 1, null, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('home_flag') }}</small>
              </div>
            </div>


             <div class="col-md-12"> 
            <button type="submit" class="btn btn-block btn-success" >Save Settings</button>
            <div class="clear-both"></div>
          </div>
          </div>
          </div>
            {!! Form::close() !!} 
      

        </div>
     
@endsection

