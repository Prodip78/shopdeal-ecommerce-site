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
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							
					</div>
					

					<form action="{{URL::to('/order-place')}}" method="post">
						@csrf
						<input type="radio" name="payment_method" value="Handcash">Handcash <br>
						<input type="radio" name="payment_method" value="cart">Debit <br>
						<input type="radio" name="payment_method" value="Bkash">Bkash <br>
						<input type="submit" name="submit" value="Done" class="btn btn-info">


					</form>


				</div>
	</div>
</section><!--/#do_action-->


@endsection