<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
</head>
<body style="font-family: Arial, sans-serif; color:#333;">
    <h2>Đặt hàng thành công</h2>

    <p>Xin chào <strong>{{ $order->ten_khach_hang ?? 'Khách hàng' }}</strong>,</p>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>

    <p>
        <strong>Mã đơn hàng:</strong> {{ $order->id }}<br>
        <strong>Địa chỉ:</strong> {{ $order->dia_chi ?? '' }}<br>
        <strong>Số điện thoại:</strong> {{ $order->so_dien_thoai ?? '' }}
    </p>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $tong = 0; @endphp
            @foreach($items as $item)
                @php
                    $thanhTien = $item->so_luong * $item->gia;
                    $tong += $thanhTien;
                @endphp
                <tr>
                    <td>{{ $item->ten_sach }}</td>
                    <td>{{ $item->so_luong }}</td>
                    <td>{{ number_format($item->gia, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Tổng tiền:</strong> {{ number_format($tong, 0, ',', '.') }} đ</p>

    <p>Trân trọng!</p>
</body>
</html>