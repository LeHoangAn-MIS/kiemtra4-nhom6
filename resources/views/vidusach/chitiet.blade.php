<x-book-layout>

    <x-slot name="title">
        Chi tiết sách
    </x-slot>

    <div class="container mt-4">

            <table class="table" style="border:none;">

        <!-- TIÊU ĐỀ -->
        <tr style="border:none;">
            <td colspan="2" style="border:none;">
                <h4 style="font-weight:500; margin:0;">
                    {{ $book->tieu_de }}
                </h4>
            </td>
        </tr>

                <!-- ẢNH + THÔNG TIN -->
        <tr style="border:none;">
            <!-- ẢNH -->
            <td style="width:30%; text-align:center; border:none;">
                <img src="{{ asset('images/'.$book->file_anh_bia) }}" 
                     class="img-fluid"
                     style="max-height:250px">
            </td>

            <!-- THÔNG TIN -->
            <td style="border:none;">
                <div style="font-size:14px; line-height:1.8">

                    <div>Nhà cung cấp: <b>{{ $book->nha_cung_cap }}</b></div>
                    <div>Nhà xuất bản: <b>{{ $book->nha_xuat_ban }}</b></div>
                    <div>Tác giả: <b>{{ $book->tac_gia }}</b></div>
                    <div>Hình thức bìa: <b>{{ $book->hinh_thuc_bia }}</b></div>

                    <div style="margin-top:8px;">


                <div class='mt-2'>
                    <b>Số lượng mua:</b>
                    <input type='number' id='product-number' size='5' min="1" value="1">

                    <button class='btn btn-success btn-sm mb-1' id='add-to-cart'>
                        Thêm vào giỏ hàng
                    </button>
                </div>

                <hr>

                        <!-- MÔ TẢ -->
        <tr style="border:none;">
            <td colspan="2" style="border:none;">
                <b>Mô tả:</b>

                <div style="
                    margin-top:10px;
                    text-align:justify;
                    font-size:14px;
                    line-height:1.9;
                    color:#444;
                ">
                    {{ $book->mo_ta }}
                </div>
            </td>
        </tr>

    </table>


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