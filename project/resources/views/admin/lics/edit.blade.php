@extends('layouts.admin')
@section('content')
<div class="admin-form-main-block mrgn-t-40">
  <h4 class="admin-form-text"><a href="{{url('admin/license')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit {{ $lic->title }}</h4> 
  {!! Form::model($lic, ['method' => 'PATCH', 'action' => ['LicenseController@update', $lic->id]]) !!}
    <div class="row admin-form-block z-depth-1">
      <div class="col-md-12">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
        <div class="summernote-main form-group{{ $errors->has('body') ? ' has-error' : '' }}">
          {!! Form::label('desc', 'Description') !!}
          {!! Form::textarea('desc', null, ['id' => 'summernote-main', 'class' => 'form-control']) !!}
          <small class="text-danger">{{ $errors->first('body') }}</small>
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