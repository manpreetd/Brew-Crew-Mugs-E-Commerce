@extends('layouts.master')
@section('title', 'Checkout')
@section('content')

    <!-- Page Header -->
    <header class="page-header">
        <h1>Checkout</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>

    <!-- Success Message Popup -->
    @if (session()->has('success'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('success')}}
                </div>
            </div>
        </section>
    @endif

    <!-- Main Checkout Content -->
    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <h3>Personal Information</h3>
                <form action="{{route('checkout.submit')}}" id="payment-form" method="post">
                    @csrf
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="@error('name') has-error @enderror" placeholder="John Doe" value={{old('name') ? old('name') : auth()->user()->name}}>
                        @error('name')
                            <span class="field-error">The name field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="@error('email') has-error @enderror" placeholder="John Doe" value={{old('email') ? old('email') : auth()->user()->email}}>
                        @error('email')
                            <span class="field-error">The email field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="@error('phone') has-error @enderror" placeholder="John Doe" value={{old('phone') ? old('phone') : auth()->user()->phone}}>
                        @error('phone')
                            <span class="field-error">The phone number field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="">-- Select Country --</option>
                            <option value="USA">United States</option>
                            <option value="Canada">Canada</option>
                        </select>
                        @error('country')
                            <span class="field-error">The country field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province" class="@error('province') has-error @enderror" placeholder="Ontario" value={{old('province') ? old('province') : auth()->user()->province}}>
                        @error('province')
                            <span class="field-error">The province field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="@error('city') has-error @enderror" placeholder="Toronto" value={{old('city') ? old('city') : auth()->user()->city}}>
                        @error('city')
                            <span class="field-error">The city field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="zip">Zip Code</label>
                        <input type="text" name="zip" id="zip" class="@error('zip') has-error @enderror" placeholder="L1E 3J4" value={{old('zip') ? old('zip') : auth()->user()->zip}}>
                        @error('zip')
                            <span class="field-error">The zip code field is required.</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="@error('address') has-error @enderror" placeholder="123 Main Street" value={{old('address') ? old('address') : auth()->user()->address}}>
                        @error('address')
                            <span class="field-error">The address field is required.</span>
                        @enderror
                    </div>

                    <!-- Payment fields section -->
                    <div class="payment-section">
                        <h2>Payment Information</h2>
                        <div class="field-group">
                            <div class="field">
                                <label for="card_number">Card Number</label>
                                <input type="text" name="card_number" id="card_number" class="@error('card_number') has-error @enderror" placeholder="1234 5678 9012 3456" value="{{ old('card_number') }}">
                                @error('card_number')
                                    <span class="field-error">The card number field is required.</span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="expiry_date">Expiration Date</label>
                                <input type="text" name="expiry_date" id="expiry_date" class="@error('expiry_date') has-error @enderror" placeholder="MM/YY" value="{{ old('expiry_date') }}">
                                @error('expiry_date')
                                    <span class="field-error">The expiration date field is required.</span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="cvv">CVV</label>
                                <input type="text" name="cvv" id="cvv" class="@error('cvv') has-error @enderror" placeholder="123" value="{{ old('cvv') }}">
                                @error('cvv')
                                    <span class="field-error">The CVV field is required.</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                
                    <!-- Submit button -->
                    <div class="field">
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <!-- Popup model -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-button">&times;</span>
            <p>Thanks for your purchase! Your order will be shipped to you shortly.</p>
        </div>
    </div>
@endsection