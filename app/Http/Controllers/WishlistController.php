<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Add a product to the wishlist
    public function post($id){
        
        Auth::user()->wishlist()->attach($id);
        return back();
    }

    // Remove a product from the wishlist
    public function remove($id){

        Auth::user()->wishlist()->detach($id);
        return back();
    }
}
