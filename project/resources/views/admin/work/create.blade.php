@extends('layouts.admin')
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/photos')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Add Photos</h4> 
    {!! Form::open(['method' => 'POST', 'action' => 'WorkController@store', 'files' => true]) !!}
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
              {!! Form::select('tag[]', $tags, null, ['class' => 'form-control tag-select', 'multiple' => 'multiple','required']) !!}
              <small class="text-danger">{{ $errors->first('tag') }}</small>
          </div>   
          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Select Status') !!}
            {!! Form::select('status', ['1' => 'Approved', '2' => 'Pending', '0' => 'Rejected'], null, ['class' => 'form-control select2']) !!}
            <small class="text-danger">{{ $errors->first('status') }}</small>
          </div>
          
          <!-- <div class="form-group{{ $errors->has('lic_id') ? ' has-error' : '' }}">
            {!! Form::label('lic_id', 'Select License Type') !!}
            <select name="lic_id" class="form-control select2">
              <option value="0">Please Choose</option>
              @foreach($license as $lic)
              <option value="{{ $lic->id }}">{{ $lic->title }}</option>
              @endforeach
            </select> -->
            <small class="text-danger">{{ $errors->first('status') }}</small>
          </div>  
          
          <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::label('is_featured', 'Featured') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('is_featured', 1, 1, ['class' => 'checkbox-switch']) !!}
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
<!-- 
          <div class="form-group">
            <label>Meta Tag:</label>
            <input type="text" name="meta_tag" class="form-control" placeholder="Enter keyword by comma">
          </div>

          <div class="form-group">
            <label>Meta Description: </label>
            <textarea name="meta_desc" id="" cols="30" rows="10" class="form-control"></textarea>
          </div> -->

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

          <!-- <div class="form-group{{ $errors->has('is_psd') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::label('is_psd', 'PSD or AI Files') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <input type="checkbox" onclick="showzip()" class="checkbox-switch" name="is_psd" id="is_psd"/>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('is_psd') }}</small>
            </div>
          </div> -->


 <div style="display:none;" class="input-file-block" id="file_zip">
            {!! Form::label('zip', 'zip') !!} - <p class="inline info">Help block text</p>
            {!! Form::file('zip', ['class' => 'input-file', 'id'=>'zip']) !!}
            <label for="zip" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Zip File">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose File</span>
            </label>
            <p class="info">Choose custom File</p>
            <small class="text-danger">{{ $errors->first('zip') }}</small>
          </div>  


          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
          <div class="clear-both"></div>
        </div>  

        <!-- <div class="col-md-6">
          <h5>Image Info</h5>
          <hr>

          <div class="form-group">
            <label>Model:</label>
            <input type="text" class="form-control" value="" name="model" placeholder="Enter Model No">
          </div>

          <div class="form-group">
              <label>Dimension:</label>
              <input name="dimension" type="text" value="" class="form-control" placeholder="ex. 2000x2000">
          </div>
          
          <div class="form-group">
            <label>Aperture:</label>
            <input name="aperture" type="text" value="" class="form-control" placeholder="ex. f2.0">
          </div>
          
          <div class="form-group">
            <label>Focal Length:</label>
            <input type="text" name="focal_len" value="" class="form-control" placeholder="ex. 28mm">
          </div>

          <div class="form-group">
            <label>ISO:</label>
            <input type="text" name="iso" value="" class="form-control" placeholder="ex. ISO800">
          </div>

          <div class="form-group">
            <label>Shutter Speed:</label>
            <input type="text" name="shutter_speed" value="" class="form-control" placeholder="ex. 1/4000th">
          </div>
         
        </div> -->
      </div>
    {!! Form::close() !!}
  </div>
@endsection

@section('custom-script')

<script type="text/javascript">

function showzip(){

  if ($('#is_psd').is(':checked')) {
    $('#file_zip').show('slow');
  }else{
     $('#file_zip').hide('slow');
  }


}

</script>
@endsection