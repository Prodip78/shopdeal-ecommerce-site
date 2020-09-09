@extends('User.layouts.master')

@section('content')

					
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
										
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php
	
                                       foreach ($product_category as $view) {?>		
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{$view->product_image}}" style="height: 200px;width: 280px;" alt="" />
													<h2>TK{{$view->product_price}}</h2>
													<p>{{$view->product_name}}</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									
										<?php }?>	

								</div>
							</div>
							</div>
						
					</div><!--/recommended_items-->

@endsection

