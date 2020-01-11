@extends('layouts.app')
@section('content')
@if($prod)
	<center><h1>Your cart items</h1></center><br><br>
	@foreach($prod as $pro)
		<div class="row">
			<div class="col-6 col-sm-6 col-md-3 col-lg-4">
				<a href="/product/{{$pro->id}}"><img src="/storage/images/{{$pro->image}}" style="height: 250px; width: 100%;"></a>	
			</div>
			<div class="col-6 col-sm-6 col-md-9 col-lg-8">
				<p style="font-size: 23px;color:black;">Prod id - {{$pro->id}}</p>
				<p style="font-size: 23px;color:black;">Product name- {{$pro->product_name}}</p>
				<p style="font-size: 23px;color: black;"><b>Rs.{{$pro->price}}</b>/-</p>
				<p style="font-size: 23px;color:black;cursor: progress;">Seller - <a href="">{{$pro->product_by}}</a>(<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>4.0)</p>
				<br>
				<p><button class="btn btn-danger">Move To wishlist</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-warning" href="/removeproductfromcart/id/{{$pro->cart_add_id}}">Remove from Cart</a></p>
			</div>
		</div>
		<br>
		<hr style="border:1px solid #888888;">
		<!--
		
		<br>
		<hr>-->
	@endforeach
<br>
<p class="display-4">Proceed To Checkout</p>
		<hr style="">
		<br>
		<div class="row">
			<div class="col-6 col-sm-6">
				<div class="row">
					<div class="col-6 col-sm-6">
						<p><b style="font-size: 24px;font-weight: bold;color: green;">Cart Total</b></p>
						<p><b style="font-size: 24px;font-weight: bold;color: green;">SGST, CGST<sup>(9% + 9%)</sup></b></p>
						<p><b style="font-size: 24px;font-weight: bold;color: green;">Delivery Fee</b></p>
					</div>
					<div class="col-6 col-sm-6">
						<p style="font-size: 24px;"><b>34999/-</b></p>
						<p style="font-size: 24px;"><b>8889/-</b></p>
						<p style="font-size: 24px;"><b>100/-</b></p>
					</div>
				</div>
			</div>
			<div class="col-6 col-sm-6">
				
			</div>
		</div>
		<hr style="border:1px solid #888888;">
		<div class="row">
			<div class="col-6 col-sm-6">
				<p class="display-4"><b>Grand Total</b></p>
			</div>
			<div class="col-6 col-sm-6 ">
				<p class="display-4" style="float: right;margin-right: 15px;"><b>53998/-</b></p>
			</div>
		</div>
		<hr style="border:1px solid #888888;">
		<button style="float:right;" class="btn btn-success btn-lg">Proceed To Pay</button>
@else
	<br><br><br><br><br><br><br><br>
	<center><i class="fas fa-shopping-cart" style="font-size:190px;color:#e0e0e0;"></i><br><br>
		<p class="display-4">Your shopping cart is empty</p>
		<p><a href="/product" class="btn btn-lg btn-default">Shop Now!</a></p></center>
	<br><br><br><br><br>
@endif
@endsection