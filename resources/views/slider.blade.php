

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php
                               $slider=DB::table('sliders')
                               			  ->where('publication_status',1)			  
    	                                  ->get();
    	                                  $i=1;
		                           foreach ($slider as $view) {

                                   if ($i==1) {

	                           	?>



							<div class="item active">

								<?php } else{?>
								<div class="item">
								<?php }?>
								<div class="col-sm-4">
									<h1><span>SHOP</span>-DEAL</h1>
									<h2>ShopDeal Ecommerce Site</h2>
									<p>Shopdeal is one of the most popular and oldest e-commerce sites in Bangladesh, specializing in electronics, home appliances, clothing etc. Recently they have added a grocery section in their subcategory which makes Daraz one of the top e-commerce sites of Bangladesh. </p>
									
								</div>
								<div class="col-sm-8">
									<img src="{{URL::to($view->slider_image)}}" style="height: 300px;width: 500px;" class="girl img-responsive" alt="" />
									<img src="{{asset('public/frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							
							<?php $i++; } ?>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->