@extends('layouts.master')
@section('title', 'Wishlist')
@section('content')

    <!-- Wishlist header -->
    <header class="page-header">
        <h1>Wishlist</h1>
    </header>

    <!-- Products list -->
    <div class="container" style="margin-top: 50px">
       <div class="products-row">
            @foreach ($products as $product)
                <x-product-box :product="$product"/>
            @endforeach
        </div> 
    </div>
@endsection