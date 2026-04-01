<x-book-layout>
    <x-slot name='title'>
        Đặt hàng
    </x-slot>

    <div>
        <div style='color:#15c; font-weight:bold;font-size:15px;text-align:center'>DANH SÁCH SẢN PHẨM</div>
        
<<<<<<< HEAD
<<<<<<< HEAD
            <table class="table text-center align-middle" 
       style="width:70%; margin:0 auto; background:#fff; border-collapse:collapse;">
    <thead class="table-light">
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th style="width:120px;">Số lượng</th>
            <th>Đơn giá</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @php $tongTien = 0; @endphp

        @foreach($data as $key=>$row)
        <tr>
            <td>{{$key+1}}</td>
            <td class="text-start">{{$row->tieu_de}}</td>
            <td>{{$quantity[$row->id]}}</td>
            <td>{{number_format($row->gia_ban,0,',','.')}}đ</td>
            <td>
                <form method='post' action="{{route('cartdelete')}}">
                    <input type='hidden' value='{{$row->id}}' name='id'>
                    <input type='submit' class='btn btn-danger btn-sm' value='Xóa'>
                    {{ csrf_field() }}
                </form>
            </td>
        </tr>
        @php
            $tongTien += $quantity[$row->id] * $row->gia_ban;
        @endphp
        @endforeach

        <tr class="fw-bold">
            <td colspan="3"><b>Tổng cộng</b></td>
            <td class="text-danger">{{number_format($tongTien,0,',','.')}}đ</td>
            <td></td>
        </tr>
    </tbody>
</table>

<style>
    .table th, .table td {
        border: 1px solid #000 !important;
        padding: 8px;
    }
</style>
=======
=======
>>>>>>> origin/nguyenhuynhsaly
            <table class='book-table' style='margin:0 auto; width:70%'>
                <thead>
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Xóa</th>
                </thead>
                <tbody>
                    @php
                        $tongTien = 0;
                    @endphp
                    @foreach($data as $key=>$row)
                       <tr>
                            <td align='center'>{{$key+1}}</td>
                            <td>{{$row->tieu_de}}</td>
                            <td align='center'>{{$quantity[$row->id]}}</td>
                            <td align='center'>{{number_format($row->gia_ban,0,',','.')}}đ</td>
                            <td align='center'>
                                <form method='post' action = "{{route('cartdelete')}}" >
                                    <input type='hidden' value='{{$row->id}}' name='id'>
                                    <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                       </tr>
                       @php
                            $tongTien +=$quantity[$row->id]*$row->gia_ban;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan='3' align='center'><b>Tổng cộng</b></td>
                        <td><b>{{number_format($tongTien,0,',','.')}}đ</b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
<<<<<<< HEAD
>>>>>>> origin/lethihonglinh
=======
>>>>>>> origin/nguyenhuynhsaly
           
                <div style='font-weight:bold;width:70%;margin:0 auto;text-align:center;'>
                    @auth
                        @if(count($data)>0)
                        <form method='post' action = "{{route('ordercreate')}}" >
                            Hình thức thanh toán <br>
                            <div class='d-inline-flex'>
                                <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                                    <option value='1'>Tiền mặt</option>
                                    <option value='2'>Chuyển khoản</option>
                                    <option value='3'>Thanh toán VNPay</option>
                                </select>
                            </div><br>
                            <input type='submit' class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>
                            {{ csrf_field() }}
                        </form>
                        @else
<<<<<<< HEAD
                            Vui lòng chọn sản phẩm cần mua
=======
                        Vui lòng chọn sản phẩm cần mua
>>>>>>> origin/nguyenhuynhsaly
                        @endif
                    @else
                        Vui lòng đăng nhập trước khi đặt hàng
                    @endauth
                </div>
            
       
    </div>

<<<<<<< HEAD
</x-book-layout>

=======
</x-book-layout>
>>>>>>> origin/nguyenhuynhsaly
