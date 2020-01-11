@extends('layouts.app')
@section('content')
	<center><p style="font-size: 38px;font-family: Chiller;" >Products List</p></center>
	@if(count($product) > 0)
		<div class="row ">
		@foreach($product as $prod)
			<a href="/product/{{$prod->id}}" style="color: inherit;text-decoration: none;"><div class="col-md-6 col-sm-12 col-lg-4" style="border:0px double black; padding: 25px">
				<img src="/storage/images/{{$prod->product_image}}" style="width:100%;height:260px;"><br>
				<font color="black"><h4 style="text-transform: capitalize;">{{ $prod -> product_name}}</h4>
				<h3>Rs.{{$prod->selling_price}}</h3>

				<h4><strike>{{$prod->actual_price}}</strike></h4>
				
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6">
						<button class="btn btn-dark btn-block">Add to Wishlist</button>
					</div>
					<div class="col-6 col-sm-6 col-md-6">
						<a href="/product/{{$prod->id}}" class="btn btn-primary btn-block">Add to Cart</a>
					</div>
				</div>
			</div></a>
		@endforeach
			</div>
	@endif
@endsection