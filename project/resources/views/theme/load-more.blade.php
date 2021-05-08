@if(isset($work) && count($work)>0)
	<div class="row grid">
		@foreach($work as $key => $item)
			@if($item->workphotos->first())
				<div class="col-lg-4 work-img-block">
					<div class="work-block">
						<a href="{{ url('photos/'.$item->uni_id.'/'.$item->slug) }}" title="{{$item->title}}">
							<img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}">	
							<div class="overlay-bg"></div>
							<div class="item-dtl">
								<h5 class="item-name">{{$item->categories->title}}</h5>
								<a href="#" class="item-by">{{$item->users->name}}</a>
							</div>
							<div class="item-btn">
								@auth
                	<a href="#" class="btn btn-white img-like {{ $item->isLiked == 1 ? 'active' : null }}" data-like="{{ $item->id }}" title="Like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
                	<a href="#" class="btn btn-white img-fav {{ $item->isFavorite == 1 ? 'active' : null }}" data-fav="{{ $item->id }}" title="Collection"><i class="fa fa-plus"></i> <span>{{$item->favorites()->count()}}</span></a>
                @else
                	<a href="{{route('login')}}" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
                	<a href="{{route('login')}}" class="btn btn-white img-fav" title="Collection"><i class="fa fa-plus"></i> <span>{{$item->favorites()->count()}}</span></a>
                @endauth
								<a href="{{asset('images/work/'.$item->workphotos->first()->images)}}" data-id="{{ $item->id }}" class="btn btn-white img-download" downlaod><i class="fa fa-download"></i><span>{{$item->download}}</span></a>
							</div>
						</a>
					</div>
				</div>
			@endif
		@endforeach
	</div>
@endif