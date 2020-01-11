@extends('layouts.app')
@section('content')
	<center><p style="font-size: 38px;font-family: Chiller;" ><b>Add Product</b></p></center>
	<hr>
	<div class="container" >
<div class="alert alert-info" role="alert">

<p><strong>Going Good!</strong> You are just one step away to add your product</p>
<p><a href=""><b>Click here</b></a> for Seller's Guidelines </p>

</div>
		{!! Form::open(['action'=>'Productcontroller@store', 'method'=>'Post', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{{ Form::label('prod', 'Product Name') }}
			{{ Form::text('prod','',  ['class' => 'form-control', 'placeholder'=>'Enter name of the product']) }}
			<!--{{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter here...'])}}-->
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6">
					{{ Form::label('category', 'Category')}}
			<!--{!! Form::select('category', ['true' => 'vegetarisch', 'false' => 'fleisch'], null, ['class' => 'form-control']) !!}-->
			{{ Form::select('category', array('shoes' => 'Shoes', 'clothings' => 'Clothings', 'apparel' => 'Apparels', 'jewellery' => 'Jewellery'), null,['class' => 'form-control']) }}
				</div>
				<div class="col-12 col-sm-12 col-md-6">
					{{Form::label('brand', 'Brand')}}
					{{Form::text('brand','', ['class'=>'form-control', 'placeholder'=>'Enter Brand...'])}}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('desc', 'Description')}}
			{{ Form::textarea('desc', '', ['class'=>'form-control', 'placeholder'=>'Enter a breif about the product'])}}
		</div>
		<div class="form-group">
			{{ Form::label('image', 'Add Product image')}}
			{{Form::file('product_image')}}
			
		</div>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6">
				<div class="form-group">
			{{ Form::label('aprice', 'Actual Price')}}
			{{Form::number('aprice', '', ['class'=>'form-control', 'placeholder'=>'Enter the actual price...'])}}
		</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6">
				<div class="form-group">
			{{ Form::label('sprice', 'Selling Price')}}
			{{Form::number('sprice', '', ['class'=>'form-control', 'placeholder'=>'Enter the selling price...'])}}
		</div>
			</div>
		</div>
		<div class="form-group">
			{{Form::label('quantity', 'Quantity')}}
			{{Form::number('quantity', '', ['class'=>'form-control', 'placeholder'=>'enter no.of units'])}}
		</div>
		<br>
		<div class="form-group">
			{{Form::submit('Submit   &rarr;', ['class' => 'btn btn-primary btn-lg'])}}
		</div>
	</div>
@endsection