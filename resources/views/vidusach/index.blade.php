<x-book-layout>
    <x-slot name="title">Sách</x-slot>

    <style>
        .list-book {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .book img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .book {
            position: relative;
            margin: 10px;
            text-align: center;
            padding-bottom: 35px;
        }

        .btn-add-product {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
    
    <div id='book-view-div'>
        <div class='list-book'>
            @foreach($data as $row)
                <div class='book'>
                    <a href="{{url('sach/chitiet/'.$row->id)}}">
                        <img src="{{asset('images/'.$row->file_anh_bia)}}" width='200px' height='200px'><br>
                        <b>{{$row->tieu_de}}</b><br/>
                        <i>{{number_format($row->gia_ban,0,",",".")}}đ</i><br>
                    </a>
                    <div class='btn-add-product'>
                        <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{$row->id}}">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
    $(document).ready(function(){

        $(".menu-the-loai").click(function(){
            the_loai = $(this).attr("the_loai");
            $.ajax({
                type:"POST",
                dataType:"html",
                url: "{{route('bookview')}}",
                data:{"_token": "{{ csrf_token() }}", "the_loai": the_loai},
                success:function(data){
                    $("#book-view-div").html(data);
                }
            });
        });

        $(document).on("click", ".add-product", function(){
            id = $(this).attr("book_id");
            num = 1;
            $.ajax({
                type:"POST",
                dataType:"json",
                url: "{{route('cartadd')}}",
                data:{"_token": "{{ csrf_token() }}", "id": id, "num": num},
                success:function(data){
                    $("#cart-number-product").html(data);
                }
            });
        });

    });
    </script>

</x-book-layout>