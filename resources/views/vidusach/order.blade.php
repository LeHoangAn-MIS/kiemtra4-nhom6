<x-book-layout>

    <x-slot name="title">
        Giỏ hàng
    </x-slot>

    <div class="container mt-4">

        <h2>🛒 Giỏ hàng của bạn</h2>

        @php
            $total = 0;
        @endphp

        @if(session('cart') && count(session('cart')) > 0)

            <table class="table table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID sách</th>
                        <th>Số lượng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(session('cart') as $id => $num)

                        @php
                            // Lấy thông tin sách từ DB
                            $book = DB::table('sach')->where('id', $id)->first();
                            $subtotal = $book->gia_ban * $num;
                            $total += $subtotal;
                        @endphp

                        <tr>
                            <td>{{ $book->tieu_de }}</td>

                            <td>{{ $num }}</td>

                            <td>
                                <button class="btn btn-danger btn-sm delete-item" data-id="{{ $id }}">
                                    Xoá
                                </button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <h4 class="text-right">
                Tổng tiền: 
                <span style="color:red">
                    {{ number_format($total,0,",",".") }} đ
                </span>
            </h4>

            <div class="text-right mt-3">
                <form method="POST" action="{{ route('ordercreate') }}">
                    @csrf
                    <button class="btn btn-success">
                        Đặt hàng
                    </button>
                </form>
            </div>

        @else

            <div class="alert alert-warning mt-3">
                Giỏ hàng trống 😢
            </div>

        @endif

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function(){

        $(".delete-item").click(function(){

            let id = $(this).data("id");

            $.ajax({
                type: "POST",
                url: "{{ route('cartdelete') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(){
                    location.reload(); // reload lại trang
                }
            });

        });
    });
    </script>

</x-book-layout>