@extends('User.layouts.master')
@section('content')
@include('slider')

<h2 class="title text-center">Features Items</h2>
<?php
								$all_published_product =DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->join('brands','products.brand_id','brands.brand_id')
    			  ->limit(9)
    	          ->get();
							foreach ($all_published_product as $view) {?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">							
							<div class="single-products">
											<div class="productinfo text-center">
											<img src="{{$view->product_image}}" style="height: 200px;width: 280px;" alt="" />
											<h2>Tk{{$view->product_price}}</h2>
											<p>{{$view->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tk{{$view->product_price}}</h2>
												<p>{{$view->product_name}}</p>
												<a href="{{URL::to('/view.product'.$view->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>{{$view->brand_name}}</a></li>
										<li><a href="{{URL::to('/view.product'.$view->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
									</ul>
								</div>

							</div>
						</div>
																	
						<?php }?>
					</div><!--features_items-->
					
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<?php
								$all_published_category =DB::table('categories')
															->where('publication_status',1)
															->get();
							foreach ($all_published_category as $view) {?>
								<li class="active"><a href="{{URL::to('/product_category'.$view->category_id)}}" >{{$view->category_name}}</a></li>
							<?php }?>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >

								<?php
										$all_published_product =DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->join('brands','products.brand_id','brands.brand_id')
    			  ->limit(4)
    	          ->get();
	
                                       foreach ($all_published_product as $view) {?>	
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$view->product_image}}" style="height: 200px;width: 280px;" alt="" />
												<h2>Tk{{$view->product_price}}</h2>
												<p>{{$view->product_name}}</p>
												<a href="{{URL::to('/view.product'.$view->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								
								
								<?php }?>
							</div>
							
							<div class="tab-pane fade" id="blazers" >
								
								
								
							
							</div>
							
							<div class="tab-pane fade" id="sunglass" >
								
							</div>
	
							
							
							<div class="tab-pane fade" id="poloshirt" >
								
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php
										$all_published_product =DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->join('brands','products.brand_id','brands.brand_id')
    			  ->orderBy('product_id','desc')
    			  ->limit(6)
    	          ->get();
	
                                       foreach ($all_published_product as $view) {?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{$view->product_image}}" style="height: 200px;width: 280px;" alt="" />
													<h2>Tk{{$view->product_price}}</h2>
													<p>{{$view->product_name}}</p>
													<a href="{{URL::to('/view.product'.$view->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

@endsection

