<!DOCTYPE html>
    <html>
        <head>
            <title>{{ $title ?? config('app.name', 'Book Store') }}</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <style>
            .navbar {
                background-color: #ff5850;
                font-weight:bold;
            }
            .nav-item a {
                color: #fff!important;
            }
            .navbar-nav {
                margin:0 auto;
            }
            .list-book{
                display:grid;
                grid-template-columns:repeat(4,24%);
            }
            .book {
                margin:10px;
                text-align:center;
            }
        </style>
    <body>
        <header style='text-align:center'>
            <img src="{{asset('hinh/banner_sach.jpg')}}" width="1000px">
        </header>
        @auth
        <div class="dropdown">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('account')}}">Quản lý</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                       Đăng xuất
                    </a>
                </form>
            </div>
        </div>
        @else
        <a href="{{ route('login') }}">
            <button class='btn btn-sm btn-primary'>Đăng nhập</button>
        </a>

        <a href="{{ route('register') }}">
            <button class='btn btn-sm btn-success'>Đăng ký</button>
        </a>
        @endauth
        <main style="width:1000px; margin:2px auto;">
            <div class='row'>
                <div class='col-3 pr-0'>
                    <x-menu>
                        <x-slot name='item'>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('sach')}}">Trang chủ</a>
                            </li>   
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('sach/theloai/1')}}">Tiểu thuyết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('sach/theloai/2')}}">Truyện ngắn - tản văn</a>
                            </li>   
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('sach/theloai/3')}}">Tác phẩm kinh điển</a>
                            </li>
                        </x-slot>
                    </x-menu>
                    <img src="{{asset('hinh/sidebar_1.jpg')}}" width="100%" class='mt-1'>
                    <img src="{{asset('hinh/sidebar_2.jpg')}}" width="100%" class='mt-1'>
                </div>
                <div class='col-9'>
                    {{$slot}}
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>