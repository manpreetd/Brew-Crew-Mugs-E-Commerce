<section class="product-box">

    <!-- Product Image -->
    <div class="image">
        <img src="{{asset('storage/' . $product->image)}}" alt="Mug One" width="150" height="150">

        <!-- Wishlist Button -->
        @auth
            @if(auth()->user()->wishlist->contains($product))
                <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                    @csrf
                    <button class="add-to-wishlist" type="submit">Remove from Wishlist</button>
                </form> 
            
            @else
                <form action="{{route('addToWishlist', $product->id)}}" method="post">
                    @csrf
                    <button class="add-to-wishlist" type="submit">Add to Wishlist</button>
                </form> 
                
            @endif
               
        @endauth
        
    </div>
    
    <!-- Product Details -->
    <a href="{{route('product', $product->id)}}">
        <div class="product-title">{{$product->title}}</div>
        <div class="product-category">Mugs</div>
        <div class="product-price">${{$product->price/100}}</div>
    </a>
</section>