@extends('layouts.admin')
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/photos')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Photos</h4> 
    {!! Form::model($work, ['method' => 'PATCH', 'action' => ['WorkController@update', $work->id], 'files' => true]) !!}
      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              {!! Form::label('user_id', 'Select User') !!}
              {!! Form::select('user_id', $all_user, null, ['class' => 'form-control select2','required']) !!}
              <small class="text-danger">{{ $errors->first('user_id') }}</small>
          </div>
            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
              {!! Form::label('category_id', 'Select Catgeory') !!}
              {!! Form::select('category_id', $all_category, null, ['class' => 'form-control select2','required']) !!}
              <small class="text-danger">{{ $errors->first('category_id') }}</small>
          </div>
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {!! Form::label('title', 'Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('title') }}</small>
          </div>          
          <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              {!! Form::label('desc', 'Description') !!}
              {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('desc') }}</small>
          </div>      
          <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
              {!! Form::label('tag', 'Tag') !!}
              {!! Form::select('tag[]', $tags, $ta, ['class' => 'form-control tag-select', 'multiple' => 'multiple','required']) !!}
              <small class="text-danger">{{ $errors->first('tag') }}</small>
          </div>                       
          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Select Status') !!}
            {!! Form::select('status', ['1' => 'Approved', '2' => 'Pending', '0' => 'Rejected'], null, ['class' => 'form-control select2','required']) !!}
            <small class="text-danger">{{ $errors->first('status') }}</small>
          </div>                          
          <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::label('is_featured', 'Featured') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('is_featured', null, null, ['class' => 'checkbox-switch']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('is_featured') }}</small>
            </div>
          </div>                                             
          <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::label('is_active', 'Active Status') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('is_active', 1, 1, ['class' => 'checkbox-switch']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('is_active') }}</small>
            </div>
          </div>

          <div class="form-group">
            <select name="lic_id" class="form-control">
              
              
              @foreach(App\License::all() as $lic)

             
              
                <option value="{{ $lic->id }}" {{ $work->lic_id == $lic->id ? "selected" : "" }}>{{ $lic->title }}</option>
            
             
             
              @endforeach
            </select>
          </div>

          <div class="form-group">
              <label>Meta Tag:</label>
              <input type="text" name="meta_tag" value="{{ $work->meta_tag }}" class="form-control" placeholder="Enter keyword by comma">
            </div>
  
            <div class="form-group">
              <label>Meta Description: </label>
              <textarea name="meta_desc" cols="30" rows="10" class="form-control">{{ $work->meta_desc }}</textarea>
            </div>

          <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('images', 'Image') !!} - <p class="inline info">Help block text</p>
            {!! Form::file('images', ['class' => 'input-file', 'id'=>'images']) !!}
            <label for="images" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Work Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger">{{ $errors->first('images') }}</small>
          </div>    
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          <div class="clear-both"></div>
        </div>  

        <div class="col-md-6">
            <h5>Edit Image Info</h5>
            <hr>
  
            <div class="form-group">
              <label>Model:</label>
              <input type="text" class="form-control" value="{{ $work->model }}" name="model" placeholder="Enter Model No">
            </div>
  
            <div class="form-group">
                <label>Dimension:</label>
                <input name="dimension" type="text" value="{{ $work->dimension }}" class="form-control" placeholder="ex. 2000x2000">
            </div>
            
            <div class="form-group">
              <label>Aperture:</label>
              <input name="aperture" type="text" value="{{ $work->aperture }}" class="form-control" placeholder="ex. f2.0">
            </div>
            
            <div class="form-group">
              <label>Focal Length:</label>
              <input type="text" name="focal_len" value="{{ $work->focal_len }}" class="form-control" placeholder="ex. 28mm">
            </div>
  
            <div class="form-group">
              <label>ISO:</label>
              <input type="text" name="iso" value="{{ $work->iso }}" class="form-control" placeholder="ex. ISO800">
            </div>
  
            <div class="form-group">
              <label>Shutter Speed:</label>
              <input type="text" name="shutter_speed" value="{{ $work->shutter_speed }}" class="form-control" placeholder="ex. 1/4000th">
            </div>
           
          </div>
      </div>
    {!! Form::close() !!}
  </div>
@endsection