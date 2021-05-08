@extends('layouts.theme')
@section('main-content')
<!-- section -->
<section id="page-section" class="page-main-block my-photo-page">
  <div class="container">               
    <div class="row">
    	<div class="col-md-3">
    		<div class="main-block-sidenav">
           @include('includes.user-tabs')
        </div>
    	</div>
			<div class="col-md-9">
        <div class="my-photo-content">
          <h3 class="page-heading">My Photos</h3>
          <div class="row grid">            
            @if(isset($photo) && count($photo)>0)
  						@foreach($photo as $key => $item)
                @if($item->workphotos->first())
                  <div class="col-lg-4 work-img-block">
                    <div class="work-block">
                      <a href="{{ url('photos/'.$item->uni_id.'/'.$item->slug) }}" title="{{$item->title}}"> 
                        @if($item->workphotos->first())
                          <img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}">
                        @else
                          <img src="{{asset('images/work/default.jpg')}}" class="img-fluid" alt="{{$item->title}}">
                        @endif
                        <div class="overlay-bg"></div>
                      
                          <div class="work-action-block">
                            <a href="{{route('upload.edit', $item->id)}}" class="btn btn-white"><i class="fa fa-edit"></i></a> 
                            <!-- Delete Modal -->
                            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#{{$item->id}}deleteModal"><i class="fa fa-trash"></i> </button>
                            <!-- Modal -->
                            <div id="{{$item->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                              <div class="modal-dialog modal-sm">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="delete-icon"></div>
                                  </div>
                                  <div class="modal-body text-center">
                                    <h4 class="modal-heading">Are You Sure ?</h4>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                  </div>
                                  <div class="modal-footer">
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['UploadController@destroy', $item->id]]) !!}
                                        <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    {!! Form::close() !!}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                       
                        <div class="item-dtl">
                          <h5 class="item-name">{{$item->categories->title}}</h5>
                          <a href="#" class="item-by">{{$item->users->name}}</a>
                        </div>
                      </a>
                      @if($item->status == 0) 
                        <div class="label label-warning">Rejected</div>
                      @endif
                    </div>
                  </div>
                @endif
              @endforeach       
            @else
              <div class="no-block">No Photos Yet</div>
            @endif
  				</div>
        </div>
			</div>
		</div> 
	</div>
</section>
@endsection