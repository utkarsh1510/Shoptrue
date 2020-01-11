@extends('layouts.app')
@section('content')
	<center><h1><b>Edit the Product Details</b></h1></center>
	<hr>
	<div class="alert alert-warning">
		<b>If you add another image it will overwrite the previous one!<br>
		If you want to delete the previous image simply check the box!</b>
	</div>
	{!! Form::open(['action'=>['Productcontroller@update', $prod->id], 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{{ Form::label('prod', 'Product Name') }}
			{{ Form::text('prod',$prod->product_name,  ['class' => 'form-control', 'placeholder'=>'Enter name of the product']) }}
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
					{{Form::text('brand',$prod->brand, ['class'=>'form-control', 'placeholder'=>'Enter Brand...'])}}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('desc', 'Description')}}
			{{ Form::textarea('desc', $prod->description, ['class'=>'form-control', 'placeholder'=>'Enter a breif about the product'])}}
		</div>
		<div class="form-group checking">
			{{ Form::label('image', 'Add Product image')}}
			{{Form::file('product_image', ['id'=>'check'])}}
			<p class="text-danger" style="font-weight: bolder;">{{Form::checkbox('newimage', 'delete', ['id'=>'checkedbox'])}}Delete the image!</p>
			
		</div>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6">
				<div class="form-group">
			{{ Form::label('aprice', 'Actual Price')}}
			{{Form::number('aprice', $prod->actual_price, ['class'=>'form-control', 'placeholder'=>'Enter the actual price...'])}}
		</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6">
				<div class="form-group">
			{{ Form::label('sprice', 'Selling Price')}}
			{{Form::number('sprice', $prod->selling_price, ['class'=>'form-control', 'placeholder'=>'Enter the selling price...'])}}
		</div>
			</div>
		</div>
		<div class="form-group">
			{{Form::label('quantity', 'Quantity')}}
			{{Form::number('quantity', $prod->quantity, ['class'=>'form-control', 'placeholder'=>'enter no.of units'])}}
		</div>
		<br>
		<div class="form-group">
			{{Form::hidden('_method','PUT')}}
			{{Form::submit('Save Changes &rarr;', ['class' => 'btn btn-success btn-lg'])}}
		</div>
		{!! Form::close() !!}
	</div>
	<script type="text/javascript">
		var x=document.getElementById('checkedbox');
		if(x.value='delete')
		{
			var y=document.getElementById('check');
			check.classList.add("disabled");
		}
	</script>
@endsection('content')