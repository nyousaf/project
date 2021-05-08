@extends('layouts.admin')
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/blog')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit {{ $blog->title }}</h4> 
    {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id] ,'files' => true]) !!}
      <div class="row admin-form-block z-depth-1">
        <div class="col-md-12">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {!! Form::label('title', 'Blog Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
          <div class="summernote-main form-group{{ $errors->has('details') ? ' has-error' : '' }}">
            {!! Form::label('details', 'Post Description') !!}
            {!! Form::textarea('details', null, ['id' => 'summernote-main', 'class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('details') }}</small>
          </div>
          
         
        
      <div class="form-group{{ $errors->has('stick') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-2">
                {!! Form::label('stick', 'stick') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('stick', 1, 1, ['class' => 'checkbox-switch']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('stick') }}</small>
            </div>
          </div>      
           <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
              {!! Form::label('video', 'Video URL (Optional)') !!}
              {!! Form::text('video', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('video') }}</small>
          </div>

          <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
           
            {!! Form::label('image', 'Image') !!} - <p class="inline info">Help block text</p>
            {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}

            <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Blog Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger">{{ $errors->first('image') }}</small>
          </div>
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
            <div class="clear-both"></div>
        </div>  
      </div>
    {!! Form::close() !!}
  </div>
@endsection