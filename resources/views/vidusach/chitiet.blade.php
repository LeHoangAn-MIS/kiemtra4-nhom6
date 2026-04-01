<x-book-layout>

    <x-slot name="title">
        Chi tiết sách
    </x-slot>

    <div class="container mt-4">

        <div class="row">

            <!-- Ảnh sách -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/'.$book->file_anh_bia) }}" 
                     class="img-fluid"
                     style="max-height:300px">
            </div>

            <!-- Thông tin sách -->
            <div class="col-md-8">

                <h2>{{ $book->tieu_de }}</h2>

                <p>
                    <b>Giá:</b> 
                    <span style="color:red;font-size:20px">
                        {{ number_format($book->gia_ban,0,",",".") }} đ
                    </span>
                </p>

                <div class='mt-2'>
                    <b>Số lượng mua:</b>
                    <input type='number' id='product-number' size='5' min="1" value="1">

                    <button class='btn btn-success btn-sm mb-1' id='add-to-cart'>
                        Thêm vào giỏ hàng
                    </button>
                </div>

                <hr>

                <p>
                    <p><b>Mô tả:</b></p>
                    <p>{{ $book->mo_ta }}</p>

                <br>

                <a href="{{ url()->previous() }}" class="btn btn-primary">
                    ← Quay lại
                </a>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $("#add-to-cart").click(function(){

        let id = "{{$book->id}}"; //
        let num = $("#product-number").val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('cartadd') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "num": num
            },
            success: function(data){
                $("#cart-number-product").html(data);
            },
            error: function(xhr, status, error){
                console.log(error); // để debug nếu lỗi
            }
        });

    });
});

</script>

</x-book-layout>