<?php $__env->startSection('main-content'); ?>
<!-- Page -->
	<section id="page-section" class="page-main-block">		
		<div class="container">
			<div class="about-us-page">
				<div class="coupon-dtl-outer">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="about-us-main-block page-block">
								<div class="about-section">
									<?php echo $pages->body; ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end forum -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>