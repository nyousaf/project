@extends('layouts.admin')
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/category')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Category</h4> 
    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoryController@update', $category->id], 'files' => true]) !!}
      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {!! Form::label('title', 'Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>
          <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('image', 'Category Image') !!} - <p class="inline info">Help block text</p>
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