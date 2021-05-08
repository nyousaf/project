@extends('layouts.admin')
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/video')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Video</h4> 
    {!! Form::model($video, ['method' => 'PATCH', 'action' => ['VideoController@update', $video->id], 'files' => true]) !!}
      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
           <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
              {!! Form::label('category_id', 'Select Catgeory') !!}
              {!! Form::select('category_id', $all_category, null, ['class' => 'form-control select2']) !!}
              <small class="text-danger">{{ $errors->first('category_id') }}</small>
          </div>
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {!! Form::label('title', 'Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
          <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
              {!! Form::label('link', 'Video URL') !!}
              {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'https://www.google.com']) !!}
              <small class="text-danger">{{ $errors->first('link') }}</small>
          </div>
          <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('image', 'Video Image') !!} - <p class="inline info">Help block text</p>
            {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
            <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Category Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose a File</span>
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