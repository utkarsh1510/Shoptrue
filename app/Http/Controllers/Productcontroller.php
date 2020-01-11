<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class Productcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('Adminmiddleware', ['only' => ['create']]);
        $this->middleware('auth', ['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product= Product::all();
        return view('products.index')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth()->user()->email=="admin@gmail.com")
        {
            return view('products.create');    
        }
        else
        {
            return redirect('/product')->with('error', 'You are not authorised');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'prod' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'desc' => 'required',
            'product_image' => 'image|nullable|max:1999',
            'sprice' => 'required',
            'quantity' => 'required|max:3',           
        ]);
        if($request->hasFile('product_image'))
        {
            //get filename with extension
            $filenamewithExt= $request->file('product_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get just extension
            $extension= $request->file('product_image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore= $filename.'-'.time().'.'.$extension;
            //setting path
            $path=$request->file('product_image')->storeAs('public/images',$filenameToStore);
        }
        else
        {
            $filenameToStore='noimage.png';
        }
        $save_data= new Product();
        $save_data->product_name=$request->input('prod');
        $save_data->category=$request->input('category');
        $save_data->product_by=auth()->user()->name;
        $save_data->by_email=auth()->user()->email;
        $save_data->description=$request->input('desc');
        $save_data->product_image=$filenameToStore;
        $save_data->actual_price=$request->input('aprice');
        $save_data->selling_price=$request->input('sprice');
        $save_data->brand=$request->input('brand');
        $save_data->quantity=$request->input('quantity');
        $save_data->user_id=auth()->user()->id;
        $save_data->save();
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $prod=Product::find($id);
        $all_product=Product::all();
        //return view ('Products.show')->with('prod', $prod);
        return view('Products.show', compact('prod', 'all_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products=Product::find($id);
        //check for the authorised user
        /*if(auth()->user()->id != $posts->user_id)
        {
            return redirect('/posts')->with('error', 'unauthorised user');    
        }*/
        return view('Products.edit')->with('prod', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->input('newimage')=='delete')
        {
            $filenameToStore='noimage.png';
        }
        else if($request->hasFile('product_image'))
        {
            //get filename with extension
            $filenamewithExt= $request->file('product_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get just extension
            $extension= $request->file('product_image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore= $filename.'-'.time().'.'.$extension;
            //setting path
            $path=$request->file('product_image')->storeAs('public/images',$filenameToStore);
        }
        else
        {
            $filenameToStore='noimage.png';
        }
        $save_data=Product::find($id);
        $save_data->product_name=$request->input('prod');
        $save_data->category=$request->input('category');
        $save_data->description=$request->input('desc');
        $save_data->product_image=$filenameToStore;
        $save_data->actual_price=$request->input('aprice');
        $save_data->selling_price=$request->input('sprice');
        $save_data->brand=$request->input('brand');
        $save_data->quantity=$request->input('quantity');
        $save_data->save();
        return redirect('/product')->with('Success', 'Product details Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //finding the id and stroing the result in the variable
        $product=Product::find($id);
        //checking if the person is the owner of the post or not
        if(auth()->user()->id != $product->user_id)
        {
            return redirect('/posts')->with('error', 'Unable to Delete');    
        }
        //deleting the post and returnning to the home page with a message of success
        $product->delete();
        return redirect('/home')->with('Success', 'Product Removed');
    }
}
