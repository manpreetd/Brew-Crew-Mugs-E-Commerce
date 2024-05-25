<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Handles the submission of payment details
    public function submitPayment(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'country' => 'required|string',
        'province' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'zip' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'card_number' => 'required|string|max:16',
        'expiry_date' => 'required|string|max:5',
        'cvv' => 'required|string|max:3',
    ]);

    // Set a success message in the session
    return redirect()->back()->with('success', 'Thanks for your purchase! You will receive your order soon!');
}
}
