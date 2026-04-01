<x-category-layout>
    <div class="page-title">THÊM DANH MỤC</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('danhmuc.store') }}" style="width:40%; margin:0 auto;">
        @csrf

        <label>Tên thể loại</label>
        <input type="text" name="ten_the_loai" class="form-control">

        <div style="text-align:center;">
            <button type="submit" class="btn btn-primary mt-2">Lưu</button>
        </div>
    </form>
</x-category-layout>