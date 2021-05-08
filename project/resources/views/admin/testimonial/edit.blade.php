@extends('layouts.admin')
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/testimonial')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Testimonial</h4> 
    {!! Form::model($testimonial, ['method' => 'PATCH', 'action' => ['TestimonialController@update', $testimonial->id], 'files' => true]) !!}
      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {!! Form::label('title', 'Name') !!}
              {!! Form::text('title', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
          <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
              {!! Form::label('designation', 'Designation') !!}
              {!! Form::text('designation', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('designation') }}</small>
          </div>
          <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              {!! Form::label('desc', 'Testimonial Message') !!}
              {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('desc') }}</small>
          </div>
          <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('image', 'Testimonial Image') !!} - <p class="inline info">Help block text</p>
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