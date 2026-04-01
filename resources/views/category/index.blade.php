<x-category-layout>
    <div class="page-title">DANH MỤC SÁCH</div>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('danhmuc.create') }}" class="btn btn-success btn-sm mb-2">Thêm</a>

    <table>
        <tr>
            <th width="80">ID</th>
            <th>Tên thể loại</th>
            <th width="180">Thao tác</th>
        </tr>

        @foreach($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->ten_the_loai }}</td>
            <td style="text-align:center;">
                <a href="{{ route('danhmuc.edit', $row->id) }}" class="btn btn-info btn-sm">Sửa</a>
                <a href="{{ route('danhmuc.delete', $row->id) }}"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Bạn có chắc muốn xóa không?')">
                    Xóa
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</x-category-layout>