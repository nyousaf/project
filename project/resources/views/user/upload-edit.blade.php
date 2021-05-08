@extends('layouts.theme')
@section('main-content')
<!-- section -->
<section id="page-section" class="page-main-block upload-edit-page">
  <div class="container">               
    <div class="row">
    	<div class="col-sm-3">
    		@include('includes.user-tabs')
    	</div>
			<div class="col-sm-9">
  			{!! Form::model($work, ['class' => 'upload-form', 'method' => 'PATCH', 'action' => ['UploadController@update', $work->id], 'files' => true]) !!}
					<h3 class="title">Upload Photo Informations</h3>
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">  
					<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            {!! Form::select('category_id', $all_category, null, ['class' => 'form-control options', 'placeholder' => '--Select Category--', 'required']) !!}
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
              {!! Form::select('tag[]', $tags, $ta, ['class' => 'form-control tags-select', 'multiple' => 'multiple', 'required']) !!}
              <small class="text-danger">{{ $errors->first('tag') }}</small>
          </div>  
					<div class="text-left form-group{{ $errors->has('images') ? ' has-error' : '' }} input-file-block">
            {!! Form::file('images', ['class' => 'input-file', 'id'=>'images']) !!}
            <small class="text-danger">{{ $errors->first('images') }}</small>	
          </div> 
					<div class="term-and-conditions text-left">
						<input type="checkbox" checked=""> I have read and accepted official contest rules.
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
  			{!! Form::close() !!}
			</div>
		</div>
	</div>
</section>
@endsection