<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Home Page
    public function home(){
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
        return view('pages.components.home.home', ['products' => $products]);
    }

    // Cart Page
    public function cart(){
        //return view('pages.components.home.cart');
        dd(session()->get('cart'));
    }

    public function wishlist(){
        return view('pages.components.home.wishlist');
    }

    public function account(){
        return view('pages.components.home.account');
    }

    public function product($id){
        $product = Product::with('category', 'colors')->findOrFail($id);
        return view('pages.components.home.product', ['product' => $product]);
    }

    
}
