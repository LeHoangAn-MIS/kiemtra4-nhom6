<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<div style="width:1000px; margin:0 auto; background:#ff5850; position:relative;">

    <!-- MENU -->
    <ul class="navbar-nav d-flex flex-row justify-content-center mb-0">
        {{ $item }}
    </ul>

    <!-- 🛒 CART -->
    <div style="position:absolute; right:20px; top:10px;">
        <div style="position:relative; color:white;">

            <!-- Badge -->
            <div id="cart-number-product"
                 style="width:18px; height:18px; background:#28a745; font-size:11px; border-radius:50%; position:absolute; top:-5px; right:-8px; display:flex; align-items:center; justify-content:center;">
                {{ session('cart') ? count(session('cart')) : 0 }}
            </div>

            <!-- Icon -->
            <a href="{{ route('order') }}" style="color:white;">
                <i class="fa fa-shopping-cart"></i>
            </a>

        </div>
    </div>
<style>   
.navbar-nav {
    display: flex;
    justify-content: center;
    gap: 25px;
}

.navbar-nav .nav-link {
    color: white !important;
    font-weight: bold;
}
</style>
</div>