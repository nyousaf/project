@extends('layouts.theme')
@section('main-content')
<section id="page-section" class="page-main-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>{{ $lic->title }}</h4>
                <hr>
                <p>
                    {!! $lic->desc !!}
                </p>
            </div>
        </div>
    </div>
</section>

@endsection