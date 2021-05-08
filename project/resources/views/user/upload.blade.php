@extends('layouts.theme')
@section('main-content')
<!-- section -->
<section id="page-section" class="page-main-block upload-page">
  <div class="container">               
    <div class="row">
    	<div class="col-sm-3">
    	<div class="main-block-sidenav">
           @include('includes.user-tabs')
        </div>
    	</div>
			<div class="col-sm-9">
        <div class="page-content">
          <h3 class="page-heading">Upload Photo Informations</h3>
  			  {!! Form::open(['class' => 'upload-form', 'method' => 'POST', 'action' => 'UploadController@store', 'files' => true]) !!}
  					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">  
  					<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
              {!! Form::select('category_id', $category, null, ['class' => 'form-control options', 'placeholder' => '--Select Category--', 'required']) !!}
              <small class="text-danger">{{ $errors->first('category_id') }}</small>
            </div>
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              {!! Form::text('title', null, ['class' => 'form-control text_field', 'placeholder' => 'Picture Name']) !!}
              <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>          
            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              {!! Form::textarea('desc', null, ['class' => 'form-control text_field', 'placeholder' => 'Picture Information']) !!}
              <small class="text-danger">{{ $errors->first('desc') }}</small>
            </div>      
            <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                {!! Form::select('tag[]', $tags, null, ['class' => 'form-control tags-select', 'multiple' => 'multiple','required']) !!}
                <small class="text-danger">{{ $errors->first('tag') }}</small>
            </div>  
  					<div class="text-left form-group{{ $errors->has('images') ? ' has-error' : '' }} input-file-block"> 
              {!! Form::file('images', ['class' => 'input-file', 'id'=>'images', 'required']) !!}
              <small class="text-danger">{{ $errors->first('images') }}</small>
              <br>	
              <small style="margin-top:15px;">Min. Image Width :1000px and height 300px is required</small>
            </div> 
  					<div class="term-and-conditions text-left">
  						<input type="checkbox" checked=""> I have read and accepted all T&C.
  					</div>
  					<button type="submit" class="btn btn-primary">Submit</button>
    			{!! Form::close() !!}
  			</div>
      </div>
		</div>
	</div>
</section>
@endsection
@section('custom-scripts')
<script>
var _URL = window.URL || window.webkitURL;

$("#images").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          if(this.width < 1000 || this.height <= 300){
            alert( "Image is too small");
            $('#images').val('');
          }
        };
        img.src = _URL.createObjectURL(file);
    }

});
</script>
@endsection 