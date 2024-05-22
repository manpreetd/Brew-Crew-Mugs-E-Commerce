<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Cookie\SessionCookieJar;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){

        $product = Product::findOrFail($id);
        $color = Color::findOrFail($request->color); 

        $item = [
            'product' =>  $product,
            'quantity' => $request->quantity,
            'color' => $color
        ];

        if(session()->has('cart')){

            //Item already exists - increment the quantity
            $cart = session()->get('cart'); //gets the cart
            $key = $this->checkItemInCart($item); //returns the item index from array, as a key

            if($key != -1){
                $cart[$key]['quantity'] += $request->quantity; //increases quantity of product
                session()->put('cart', $cart); //updates cart
            }
            else{
                session()->push('cart', $item);
            }
        }
        else{
            session()->push('cart', $item);
        }

        return back()->with('addedToCart', 'Cart has been Updated!');
    }

    public function checkItemInCart($item){
        foreach(session()->get('cart') as $key => $val){
            if($val['product']['id'] == $item['product']['id'] && $val['color']['id'] == $item['color']['id']){ //checking if product id and color id are the same as whats already in the cart 
                return $key;
            }
        }
        return -1;
    }
}
