@extends('layouts.theme')
@section('main-content')
<!-- Map -->
<section id="page-section" class="page-main-block">
  <div class="container">               
    <div class="row">
      <div class="col-md-12">
        <div class="account-main-block">
          <div class="row">
            <div class="col-md-4">
              <div class="profile-block text-center">
                <div class="profile-img">
                  <img src="{{asset('images/user/'.$user->image)}}" alt="User">
                </div>
               
            @if(isset($paypalid) && $paypalid!="")
                <button type="button" id="coffee-btn" class="btn btn-success btn-sm"><a style="color:white;" target="_blank" href="{{ url($paypalid) }}">Coffee</a></button>
                @endif
                 @auth
                  <button type="button" id="follow-btn" class="btn btn-outline-info btn-sm " data-follow="{{ $user->id }}">{{ $user->followers()->where('follower_id', $auth->id)->first() ? 'Unfollow' : 'Follow' }}</button>
                @else
                 <a href="{{route('login')}}" class="btn btn-outline-info btn-sm">Follow</a>
                @endauth
              </div>
            </div>
            <div class="col-md-8">
              <div class="profile-dtl">
                <h6 class="text-capitalize" >{{$user->name}}</h6>
                <div >Joined on {{$user->created_at->format('jS F, Y')}}</div>
                <p>{{$user->brief}}</p>
                <ul>
                  <li><i class="fa fa-picture-o"></i> Photos : {{$user->works->count()}}</li>
                  <li><i class="fa fa-heart"></i> Collection : {{$user->user_favorites->count()}}</li>
                  <li><i class="fa fa-users"></i> Followers : {{$user->followers->count()}}</li>
                  <li><i class="fa fa-male"></i> Followings : {{$user->followings->count()}}</li>
                  {{-- <li>views{{$user->user_favorites->count()}}</li> --}}
              </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 work-main-block">
        <div class="row grid">            
          @if(isset($photo) && count($photo)>0)
            @foreach($photo as $key => $item)
              <div class="col-lg-4 work-img-block">
                <div class="work-block">
                  <a href="{{ url('photos/'.$item->uni_id.'/'.$item->slug) }}" title="{{$item->title}}"> 
                    @if($item->workphotos->first())
                      <img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}">
                    @else
                      <img src="{{asset('images/work/default.jpg')}}" class="img-fluid" alt="{{$item->title}}">
                    @endif
                    <div class="overlay-bg"></div>
                    @if($item->status == '2')
                      <div class="work-action-block">
                        <a href="{{route('upload.edit', $item->id)}}" class="btn btn-danger">Edit</a> 
                        <!-- Delete Modal -->
                        <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#{{$item->id}}deleteModal"><i class="material-icons">delete</i> </button>
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
                    @endif 
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
                      @if($item->workphotos->first())
                        <a href="{{asset('images/work/'.$item->workphotos->first()->images)}}" data-id="{{ $item->id }}" class="btn btn-white img-download" download><i class="fa fa-download"></i><span>{{$item->download}}</span></a>
                      @endif
                    </div>
                  </a>
                  @if($item->status == 0) 
                    <div class="label label-warning">Rejected</div>
                  @endif
                </div>
              </div>
            @endforeach       
          @else
            <div class="no-block">No Photos Yet</div>
          @endif
        </div>
      </div>
    </div> 
  </div>
</section>
@endsection
@section('custom-scripts')
<script>
var urlLike = '{{ route('user.follow') }}';
var userId=null;var status=null;
$('[data-follow]').on('click', function(e) {
    // e.preventDefault();
    var self = $(this),
    userId = self.data('follow');
    status = self.text().trim();       
    console.log(status);
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: urlLike,
        data: {userId: userId, status: status},
        success: function (data) {       
            console.log(data);  
          },
        error: function(e,r,t){
          console.log(e)
        }
    }).done(function(data) {
        // $('#count').html(data.current_count);
        if ($("#follow-btn").html() == "Follow") {
        $("#follow-btn").html('Unfollow');
        }
       else {
       $("#follow-btn").html('Follow');
       }
    }).fail(function() {
      alert( "We are facing some issues currenlty. Please try again later." );
    })
});
</script>
@endsection 