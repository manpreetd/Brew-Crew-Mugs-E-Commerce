<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // Displays the home page with all products
    public function home(){
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
        return view('pages.components.home.home', ['products' => $products]);
    }

    // Displays the cart page
    public function cart(){
        return view('pages.components.home.cart');
    }

    // Displays the wishlist page with user's wishlist products
    public function wishlist(){
        $products = Auth::User()->wishlist;
        return view('pages.components.home.wishlist', ['products' => $products]);
    }

    // Displays the account page
    public function account(){
        return view('pages.components.home.account');
    }

    // Displays the product details page
    public function product($id){
        $product = Product::with('category', 'colors')->findOrFail($id);
        return view('pages.components.home.product', ['product' => $product, 'colors' => $product->colors()]);
    }

    // Displays the checkout page
    public function checkout(){
        return view('pages.components.home.checkout');
    }

    
}
