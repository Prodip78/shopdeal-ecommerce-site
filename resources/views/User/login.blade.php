@extends('User.layouts.master')
@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{URL::to('/login-customer')}}" method="post">
							@csrf
							<input type="email" name="customer_email" placeholder="Customer Email" required="" />
							<input type="password" name="password" placeholder="Password" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('/registration-customer')}}" method="post">
							@csrf
							<input type="text" name="customer_name" placeholder="Name"/>
							<input type="email" name="customer_email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="number" name="phone" placeholder="Phone Number"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	




@endsection