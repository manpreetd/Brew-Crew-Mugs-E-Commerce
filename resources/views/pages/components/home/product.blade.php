@extends('layouts.master')
@section('title', $product->title)
@section('content')

    <!-- Pop-up section for added to cart message -->
    @if (session()->has('addedToCart'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{session()->get('addedToCart')}}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('home')}}" class="btn btn-outlined">Continue Shopping</a>
                    <a href="{{route('cart')}}" class="btn btn-primary">Go to Cart</a>

                </div>
            </div>
        </section>
    @endif

    <!-- Product details section -->
    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <!-- Product image section -->
                <section class="product-page-image">
                    <img src="{{asset('storage/' . $product->image)}}" alt="" width="150" height="150">
                </section>

                <!-- Product details section -->
                <section class="product-page-details">
                    <p class="p-title">{{$product->title}}</p>
                    <p class="p-price">${{$product->price/100}}</p>
                    <p class="p-category">- {{$product->category->name}}</p>
                    <p class="p-description">{{$product->description}}</p>

                    <!-- Add to cart form -->
                    <form action="{{route('addToCart', $product->id)}}" method="post">
                        @csrf
                        <div class="p-form">
                            <!--<div class="p-colors">
                                <label for="color">Color</label>
                                <select name="color" id="color">
                                    <option value="">--Color--</option>
                                    @foreach ($product->colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>  
                                    @endforeach
                                </select>
                            </div>-->

                            <!-- Quantity input -->
                            <div class="p-quantity">
                                <label for="quanitity">Quantity</label>
                                <input type="number"  name="quantity" min="1" max="99" value="1" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-cart">Add to Cart</button>
                    </form> 
                </section>
            </div>
        </div>
    </div>
@endsection