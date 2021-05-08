@extends('layouts.theme')
@section('main-content')
 <section id="product-section" class="product-main-block">
  <div class="container">
     <div class="widget-block category-widget">
            @if(isset($authors) && count($authors)>0)
              <h3 class="widget-heading text-info text-center">Authors</h3>
              <div class="row">
                @foreach($authors as $author)
                  <div class="col-lg-2 cat-block">
                    <div class="widget-category-content">
                    <a href="{{url('profile/'.$author->uni_id.'/'.str_slug($author->name,'-'))}}">
                      	<img src="{{asset('images/user/'.$author->image)}}" class="img-fluid" alt="{{$author->name}}">
                        <h5 class="text-center d-block p-2">{{$author->name}}</h5>
                      </a>
                    
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div> 
  </div>
</section>
@endsection
