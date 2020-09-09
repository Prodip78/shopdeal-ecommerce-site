@extends('User.layouts.master')

@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
					$contents=Cart::content();


				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $view)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{$view->options->image}}" style="height: 80px;width: 80px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$view->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>TK{{$view->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart')}}" method="post">
										@csrf
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$view->qty}}" autocomplete="off" size="2">
									<input  type="hidden" name="rowId" value="{{$view->rowId}}">
									<input type="submit" name="submit" value="Update" class="btn btn-sm btn-info">

									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">TK{{$view->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart'.$view->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
								<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>TK{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>TK{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>TK{{Cart::total()}}</span></li>
						</ul>


							<a class="btn btn-default update" href="">Update</a>

							<?php
								$customer_id=Session::get('customer_id');
								?>

								<?php if($customer_id !=NULL) { ?>
									<li><a href="{{URL::to('/checkout')}}" class="btn btn-info check_out">Checkout
									</a>
									</li>
								<?php } else {?>

							<a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->



@endsection