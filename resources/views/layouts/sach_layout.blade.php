<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

<!-- HEADER -->
<header style="text-align:center">
    <img src="{{ asset('images/banner_sach.jpg') }}" width="1000px">
</header>

<!-- MAIN -->
<main style="width:1000px; margin:2px auto;">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-3 pr-0">
            <nav class="navbar navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/layouts/sach_layout') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('sach/theloai/1') }}">Tiểu thuyết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('sach/theloai/2') }}">Truyện ngắn - tản văn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('sach/theloai/3') }}">Tác phẩm kinh điển</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- CONTENT -->
        <div class="col-9">
            @yield('content')
        </div>
<style>
.navbar {
    background-color: #ff5850;
    font-weight: bold;
}

.nav-item a {
    color: #fff !important;
}

.navbar-nav {
    margin: 0 auto;
}

.list-book {
    display: grid;
    grid-template-columns: repeat(4, 24%);
}

.book {
    margin: 10px;
    text-align: center;
}
</style>
    </div>
</main>

</body>
</html>