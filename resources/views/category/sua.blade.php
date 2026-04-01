<x-category-layout>
    <div class="page-title">CẬP NHẬT DANH MỤC</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('danhmuc.update') }}" style="width:40%; margin:0 auto;">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">

        <label>Tên thể loại</label>
        <input type="text" name="ten_the_loai" value="{{ $item->ten_the_loai }}" class="form-control">

        <div style="text-align:center;">
            <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
        </div>
    </form>
</x-category-layout>