<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\DB;
use App\Product;

class cartcontroller extends Controller
{
    //storing the data into the database and redirecting it to the usercart 
    public function store($id)
    {
    	$prod_id=$id;
    	$user_id=Auth()->user()->id;
    	$check_product=DB::select('select * from carts where id = ? and user_id = ?', [$prod_id, $user_id]);
    	if($check_product)
    	{
    		return redirect('/carts')->with('error', 'Item already in cart');
    	}
    	else
    	{
    		$prod_id=$id;
    		$user_id=Auth()->user()->id;
    		$saveToCart= new Cart();
    		$prod_detail=Product::find($prod_id);
    		$saveToCart->product_name=$prod_detail->product_name;
    		$saveToCart->id=$prod_detail->id;
    		$saveToCart->price=$prod_detail->selling_price;
    		$saveToCart->image=$prod_detail->product_image;
    		$saveToCart->user_id=$user_id;
    		$saveToCart->product_by=$prod_detail->product_by;
    		$saveToCart->save();
    		return redirect('carts')->with('success', 'Item added to cart successfully');
    	}
    }

    //Function to fetch the data just to simply view the user cart
    public function fetchCartItems()
    {
    	$user_id=auth()->user()->id;
    	$usersCartItems = DB::select('select * from carts where user_id = ?', [$user_id]);
        //$grandtotal=DB::select('select sum(price) from carts where user_id=?', [$user_id]);
        //return view('user.index', ['users' => $users]);
    	//$usersCartItems=Cart::find($user_id);//($user_id);
    	return view('usercart', [/*'gtotal' => $grandtotal, */'prod' => $usersCartItems ]);
    }

    public function removeProduct($id)
    {
    	$prod_id=$id;
    	$user_id=Auth()->user()->id;
    	$check=DB::delete('delete from carts where cart_add_id = ?', [$prod_id]);
    	if($check)
    		{
    			return redirect('/carts')->with('success', 'Item deleted from cart!');
    		}
    		else
    		{
    			return redirect('/carts')->with('error', 'Error deleting item');
    		}
    }
}

