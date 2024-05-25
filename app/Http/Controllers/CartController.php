<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Cookie\SessionCookieJar;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){

        // Adds a product to the cart
        $product = Product::findOrFail($id);
        //$color = Color::findOrFail($request->color); 

        // Prepare the item to be added to the cart
        $item = [
            'product' =>  $product,
            'quantity' => $request->quantity,
            //'color' => $color
        ];

        // Check if the cart already exists in the session
        if(session()->has('cart')){

            //Item already exists - increment the quantity
            $cart = session()->get('cart'); //Gets the cart
            $key = $this->checkItemInCart($item); //Returns the item index from array, as a key

            if($key != -1){
                $cart[$key]['quantity'] += $request->quantity; //Increases quantity of product if item already exists
                session()->put('cart', $cart); //Update cart
            }
            else{
                session()->push('cart', $item); // If the item does not exist, add it to the cart
            }
        }
        else{
            session()->push('cart', $item);// If the cart does not exist, create a new one
        }

        return back()->with('addedToCart', 'Cart has been Updated!');
        
    }

    // Checks if an item is already in the cart
    public function checkItemInCart($item){
        foreach(session()->get('cart') as $key => $val){
            // Checks if the product ID is the same as the one in the cart
            if($val['product']['id'] == $item['product']['id'] /*&& $val['color']['id'] == $item['color']['id']*/){ //checking if product id and color id are the same as whats already in the cart 
                return $key; // Return the index of the item in the cart
            }
        }
        return -1; // Return -1 if the item is not in the cart
    }

    // Removes a product from the cart
    public function removeFromCart($key){
        if(session()->has('cart')){
            
            $cart = session()->get('cart'); // Retrieve the cart from the session
            array_splice($cart, $key, 1);   // Remove the item from the cart
            session()->put('cart', $cart);  // Update the cart in the session
            return back()->with('success', 'Product was removed from Cart!');
        }
        return back();
    }

}
