@extends('layouts.theme')
@section('main-content')
<!-- section -->
<section id="page-section" class="page-main-block collection-page">
  <div class="container">               
    <div class="row">
      <div class="col-md-3">
       <div class="main-block-sidenav">
           @include('includes.user-tabs')
        </div>
      </div>
      <div class="col-md-9">
        <div class="my-photo-content">
          <h3 class="page-heading">My Collections</h3>
          <div class="row grid">
            @if(isset($photo) && count($photo)>0)
              @foreach($photo as $key => $item)
                @if($item->workphotos->first())
                  <div class="col-lg-4 work-img-block">
                    <div class="work-block">
                      <a href="{{ url('photos/'.$item->uni_id.'/'.$item->slug) }}" title="{{$item->title}}">
                        <img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}"> 
                        <div class="overlay-bg"></div>
                        <a href="#" data-toggle="modal" data-target="#{{$item->id}}deleteModal" class="btn btn-white close-btn" data-id="{{$item->id}}" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a>

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
                         
                        <div class="item-dtl">
                          <h5 class="item-name">{{$item->categories->title}}</h5>
                          <a href="#" class="item-by">{{$item->users->name}}</a>
                        </div>
                        <div class="item-btn">
                          @auth
                            <a href="#" class="btn btn-white img-like {{ $item->isLiked == 1 ? 'active' : null }}" data-like="{{ $item->id }}" title="like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
                          @else
                            <a href="{{route('login')}}" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
                          @endauth
                          <a href="{{asset('images/work/'.$item->workphotos->first()->images)}}" data-id="{{ $item->id }}" class="btn btn-white img-download" download><i class="fa fa-download"></i><span>{{$item->download}}</span></a>
                        </div>
                      </a>
                    </div>
                  </div>
                @endif
              @endforeach       
            @else
              <div class="no-block">No Collection Yet</div>
            @endif
          </div>
        </div>
      </div>
    </div> 
  </div>
</section>
@endsection
@section('custom-scripts')
<script>
$(document).ready(function(){
  $(".close-btn").click(function(){
      event.preventDefault();
      $(this).closest(".img-block").remove();
      var id = $(this).data('id');
      console.log(id);
       $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: "{{ url('filtercollection') }}",
          data: {id: id},
          success: function(data){
            console.log(data);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
                 console.log(XMLHttpRequest);
          }
      }).fail(function() {
        alert( "We are facing some issues currenlty. Please try again later." );
      })
    });
       
   });  
</script>
@endsection