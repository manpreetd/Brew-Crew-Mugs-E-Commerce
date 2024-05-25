<nav class="menu">
    <div class="navbar">
            <!-- Brand Title -->
            <div class="navbar-title">Brew Crew Mugs</div>

            <!-- Navigation Icons -->
            <div class="navbar-icons">
                <a href="{{ route('home') }}" class="icon home">🏠</a>
                <a href="{{ route('wishlist') }}" class="icon wishlist">📜
                    @auth
                        <span class="info-count">{{count(auth()->user()->wishlist)}}</span>
                    @endauth
                </a>
                <a href="{{ route('cart') }}" class="icon cart">🛒
                    <span class="info-count">{{session()->has('cart') ? count(session('cart')) : 0}}</span>
                </a>
                <a href="{{ route('account') }}" class="icon profile">👤</a>
            </div>
        </div>
</nav>