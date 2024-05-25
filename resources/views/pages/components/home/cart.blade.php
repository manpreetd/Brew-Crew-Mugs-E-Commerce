@extends('layouts.master')
@section('title', 'Cart')
@section('content')

    <!-- Page Header -->
    <header class="page-header">
        <h1>Cart</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>

    <!-- Success Message Popup -->
    @if (session()->has('success'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('success')}}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('cart')}}" class="btn btn-outlined">Continue Shopping</a>
                    <a href="{{route('cart')}}" class="btn btn-primary">Checkout!</a>

                </div>
            </div>
        </section>
    @endif

    <!-- Main Cart Content -->
    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quanitity</th>
                            <th>Total</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Check if Cart is not empty -->
                        @if(session()->has('cart') && count(session()->get('cart')) > 0)
                            <!-- Loop through Cart items -->
                            @foreach (session()->get('cart') as $key => $item)
                                <tr>
                                    <td>
                                        <a href="{{route('product', $item['product']['id'])}}" class="cart-item-title">
                                            <img src="{{asset('storage/' . $item['product']['image'])}}" alt="" width="100" height="100">
                                            <p>{{$item['product']['title']}}</p>
                                        </a>
                                    </td>
                                    <td>${{$item['product']['price'] / 100}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>${{App\Models\Cart::unitPrice($item)}}</td>
                                    <td>
                                        <!-- Remove from Cart Form -->
                                        <form action="{{route('removeFromCart', $key)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Cart Total Row -->
                            <tr class="cart-total">
                                <td colspan="4" style="text-align: right">Total:</td>
                                <td>${{App\Models\Cart::totalAmount()}}</td>
                            </tr>
                        @else 

                            <!-- Empty Cart Message -->
                            <tr>
                                <td colspan="6" class="empty-cart">Your Cart is Empty</td>
                            </tr>

                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Cart Actions -->
            <div class="cart-actions">
                <a href="{{route('checkout')}}" class="btn btn-primary">Go to Checkout</a>
            </div>
        </div>
    </main>
@endsection