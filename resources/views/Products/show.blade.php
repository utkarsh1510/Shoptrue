@extends('layouts.app')

@section('content')
	<div class="row">
		<!--<div class="col-12 col-sm-12 col-md-2">
			
		</div>
		<div class="col-12 col-sm-12 col-md-8 ">
			<center><img src="/storage/images/{{$prod->product_image}}" height="400px" width="100%"></center>
			<h4>{{$prod->product_name}}</h4>
			<h3><b>Rs.{{$prod->selling_price}}</b>&nbsp;<strike>{{$prod->actual_price}}</strike></h3>
			
			<fieldset>
				<legend>Description</legend>
				<p style="font-size: 20px"><i>{{$prod->description}}</i></p>
			</fieldset><br>
			<fieldset style="border:">
				<legend style="background-color: red">About Seller</legend>
				<p style="font-size: 22px;">{{$prod->product_by}}</p>
				<p>Posted on {{$prod->created_at}}</p>
				<p>Category : {{$prod->category}}</p>
			</fieldset>

 
		</div>-->
		<div class="col-12 col-sm-12 col-md-6"><br>
			<center><img src="/storage/images/{{$prod->product_image}}" height="425px" width="100%"></center>
		</div>
		<div class="col-12 col-sm-12 col-md-6">
			<h1><b>{{$prod->product_name}}<b></h1>
			<h3><b>Rs.{{$prod->selling_price}}/-</b>&nbsp;&nbsp;<strike>{{$prod->actual_price}}</strike></h3><br>
			@if($prod->quantity > 0)
				<p class="text-success">In Stock.</p>
			@else
				<p class="text-danger">Out of stock.</p>
			@endif
			<h4><b>Features</h4>
			<ul>
				<li>This will be feature number one</li>
				<li>This will be feature number two</li>
				<li>This will be feature number three</li>
			</ul><br>
			<form method="post" action="">
				<p><b>Check Deliver Date and time.</b></p>
				<div class="input-group">
					
					<input type="number" name="pcode" class="form-control" min="6" placeholder="Enter pincode..." style="border:border-bottom: 1px solid grey;background-color: #fff;">
					<span class="input-group-addon bg-primary">Check</span>
				</div>
			</form>
			<div class="row">
				<div class="col-6 col-sm-6 col-md-6"><br>
					<button class="btn btn-block btn-primary">Add to Wishlist</button>
				</div>
				<div class="col-6 col-sm-6 col-md-6"><br>
					@if($prod->quantity > 0)
						<a href="/cart/id/{{$prod->id}}" class="btn btn-block btn-danger">Add to Cart</a>
					@else
						<button class="btn btn-block btn-danger disabled">Add to Cart</button>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="container"><details style="border: 0px solid #aaa;
    border-radius: 4px;
    padding: .5em .5em 0;" open="open">
			<summary style="font-weight: bold;
    margin: -.5em -.5em 0;
    padding: .5em;"><h3><span class="plus" style="content: '\002B'"></span><b>Additional Information</b></h3></summary>
			<br><table border="0" class="table table-striped">
					<tr>
						<td>Description</td>
						<td>{{$prod->description}}</td>
					</tr>
					<tr>
						<td>Category</td>
						<td>{{$prod->category}}</td>
					</tr>
					<tr>
						<td>Seller</td>
						<td>{{$prod->product_by}}</td>
					</tr>
					<tr>
						<td>Brand</td>
						<td>
							@if($prod->brand=='')
								Shoptrue
							@else
								{{$prod->brand}}
							@endif
						</td>
					</tr>
				</table>
			<!--
				A shoe is an item of footwear intended to protect and comfort the human foot, while the wearer is doing various activities. Shoes are also used as an item of decoration and fashion. The design of shoes has varied enormously through time and from culture to culture, with appearance originally being tied to function. Additionally, fashion has often dictated many design elements, such as whether shoes have very high heels or flat ones. Contemporary footwear in the 2010s varies widely in style, complexity and cost. Basic sandals may consist of only a thin sole and simple strap and be sold for a low cost. High fashion shoes made by famous designers may be made of expensive materials, use complex construction and sell for hundreds or even thousands of dollars a pair. Some shoes are designed for specific purposes, such as boots designed specifically for mountaineering or skiing.-->
			
		</details></div>
	</div>
	<br><br><br>
	<h2>People also viewed</h2>
	<hr>
	<div class="row ">
		@foreach($all_product as $pro)
			@if($prod->category == $pro->category)
				@if($prod->id != $pro->id)
				<a href="/product/{{$prod->id}}" style="color: inherit;text-decoration: none;">
				<div class="col-md-6 col-sm-12 col-lg-4" style="border:0px double black; padding: 25px">
				<img src="/storage/images/{{$pro->product_image}}" style="width:100%;height:260px;"><br>
				<font color="black"><h4 style="text-transform: capitalize;">{{ $pro -> product_name}}</h4>
				<h3>Rs.{{$pro->selling_price}}</h3>

				<h4><strike>{{$pro->actual_price}}</strike></h4>
				
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6">
						<button class="btn btn-dark btn-block">Add to Wishlist</button>
					</div>
					<div class="col-6 col-sm-6 col-md-6">
						<button class="btn btn-primary btn-block">Add to Cart</button>
					</div>
				</div>
				</div></a>
				@endif
			@endif
		@endforeach
			</div>

	
@endsection