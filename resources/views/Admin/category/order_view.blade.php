@extends('admin.layouts.master')
@section('admin_content')

<div class="row-fluid sortable">
	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
		</div>
       <div class="box-content">
       	<table class="table">
       		<thead>
       		
       		<tr>
       				<th>Username</th>
       				<th>Mobile</th>

       			</tr>
       		</thead>
       		<tbody>
       			<tr>
       				@foreach($order_view as $view)
       				@endforeach
       				<td>{{$view->customer_name}}</td>
       				<td>{{$view->phone}}</td>
       			</tr>
       			
       		</tbody>

       	</table>
       	
       </div>

	</div>
		<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
		</div>
       <div class="box-content">
       	<table class="table table-striped">
       		<thead>
       			<tr>
       				<th>Username</th>
       				<th>Address</th>
       				<th>Mobile</th>
       				<th>Email</th>

       			</tr>
       		</thead>
       		<tbody>
       			<tr>
                                   @foreach($order_view as $view)
                                   @endforeach
       		    	<td>{{$view->shipping_fast_name}}</td>
       				<td>{{$view->shipping_address}}</td>
       				<td>{{$view->phone}}</td>
       				<td>{{$view->shipping_email}}</td>

       			</tr>
       			
       		</tbody>

       	</table>
       	
       </div>

	</div>

<div class="row-fluid sortable">

	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
		</div>
       <div class="box-content">
       	<table class="table">
       		<thead>
       			
       			<tr>
       				<th>Id</th>
       				<th>Product Name</th>
       				<th>Product Price</th>
       				<th>Product Sales Quantity</th>
       				<th>Product Sub-total</th>
       				

       			</tr>
       			
       		</thead>
       		<tbody>
       			  @foreach($order_view as $view)
       			<tr>
       				<td>{{$view->order_id}}</td>
       				<td>{{$view->product_name}}</td>
       				<td>{{$view->product_price}}</td>
       				<td>{{$view->product_sales_quantity}}</td>
       				<td>{{$view->product_price*$view->product_sales_quantity}}</td>
       			</tr>
       			@endforeach
       		</tbody>
       		<tfoot>
       			<tr>
       				<td colspan="4">Total with vat:</td>
       				<td><strong> {{$view->order_total}}TK</strong></td>
       			</tr>
       		</tfoot>

       	</table>
       	
       </div>

	</div>


	
</div>



</div>




@endsection