<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
        public function AddToCart(Request $request)
    {
        $qty = $request->qty;
        $product_id = $request->product_id;
        $productCart = DB::table('products')
                        ->where('product_id',$product_id)->first();
        $data['quantity'] = $qty;
        $data['id']=$productCart->product_id;
        $data['name']=$productCart->product_name;
        $data['price']=$productCart->product_price;
        $data['attributes']['image']=$productCart->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');
        
    }

    public function ShowCart()
    {
        $PublishedCategory = DB::table('tbl_category')
                                 ->where('publication_status',1)->get();
        return view('pages.add_to_cart')->with('PublishedCategory',$PublishedCategory);
        //return view('pages.add_to_cart')->with($ManageCategory);
    }

    public function DeleteCart($product_id)
    {
        Cart::remove($product_id);
        return Redirect::to('/show-cart');
    }

    public function UpdateCart(Request $request)
    {
        $qty = $request->quantity;
        $product_id = $request->id;
  
        Cart::update($product_id, $qty);

        return Redirect::to('/show-cart');
    }
}
