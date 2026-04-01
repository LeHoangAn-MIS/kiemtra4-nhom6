<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
</head>
<body style="font-family: Arial, sans-serif; color:#333;">
    <h2>Đặt hàng thành công</h2>

    <p>Xin chào <strong>{{ $order->ten_khach_hang ?? $order->name ?? 'Khách hàng' }}</strong>,</p>

    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>

    <p>
        <strong>Mã đơn hàng:</strong> {{ $order->id ?? $order->ma_don_hang }}<br>
        <strong>Ngày đặt:</strong> {{ date('d/m/Y H:i') }}<br>
        <strong>Địa chỉ nhận hàng:</strong> {{ $order->dia_chi ?? $order->address ?? '' }}<br>
        <strong>Số điện thoại:</strong> {{ $order->so_dien_thoai ?? $order->phone ?? '' }}
    </p>

    <h3>Chi tiết đơn hàng</h3>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background:#f2f2f2;">
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $tong = 0; @endphp
            @foreach($items as $item)
                @php
                    $tenSach = $item->ten_sach ?? $item->title ?? 'Sách';
                    $soLuong = $item->so_luong ?? $item->quantity ?? 1;
                    $donGia = $item->gia ?? $item->price ?? 0;
                    $thanhTien = $soLuong * $donGia;
                    $tong += $thanhTien;
                @endphp
                <tr>
                    <td>{{ $tenSach }}</td>
                    <td>{{ $soLuong }}</td>
                    <td>{{ number_format($donGia, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 15px;">
        <strong>Tổng tiền:</strong> {{ number_format($tong, 0, ',', '.') }} đ
    </p>

    <p>Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</p>

    <p>Trân trọng!</p>
</body>
</html>