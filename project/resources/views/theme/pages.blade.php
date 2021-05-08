@extends('layouts.theme')
@section('main-content')
<!-- Page -->
	<section id="page-section" class="page-main-block">		
		<div class="container">
			<div class="about-us-page">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="about-us-main-block page-block">
								<div class="about-section">
									{!! $pages->body !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end forum -->
@endsection