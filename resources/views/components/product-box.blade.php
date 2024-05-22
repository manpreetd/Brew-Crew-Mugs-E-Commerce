<a href="{{route('product', $product->id)}}"  class="product-box">
    <div class="image">
        <img src="{{asset('storage/' . $product->image)}}" alt="Mug One" width="150" height="150">
    </div>
    <div class="product-title">{{$product->title}}</div>
    <div class="color-platelets">
            <div class="color-platelete" style="background: rgb(234, 0, 255)"></div>
            <div class="color-platelete" style="background: rgb(0, 255, 191)"></div>
            <div class="color-platelete" style="background: rgb(0, 68, 255)"></div>
        
    </div>
    <div class="product-category">Mugs</div>
    <div class="product-price">$50.00</div>
</a>