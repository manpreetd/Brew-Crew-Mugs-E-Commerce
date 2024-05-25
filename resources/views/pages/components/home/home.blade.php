@extends('layouts.master')
@section('name', 'Home')
@section('content')

    <!-- Main content section -->
    <main class="homepage">

        <!-- Include the header component -->
        @include('pages.components.home.header')
        
        <!-- Section for displaying featured products -->
        <section class="products-section">
            <div class="container">
                <h1 class="section-title">Featured Products</h1>
                <div class="products-row">
                    
                    <!-- Loop through each product and display a product box component -->
                    @foreach ($products as $product)
                        <x-product-box :product="$product"/>
                    @endforeach

                </div>

            </div>
        </section>
    </main>
@endsection