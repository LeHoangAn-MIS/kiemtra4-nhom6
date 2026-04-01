<x-account-panel>

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
        <div style='color:red;width:30%; margin:0 auto'>
            <div>Whoops! Something went wrong.</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Thông báo thành công --}}
    @if (session('status'))
        <div class="alert alert-success" style="width:30%; margin:0 auto">
            {{ session('status') }}
        </div>
    @endif
    {{-- Hiển thị ảnh đại diện nếu có --}}
    @if(data_get($user, 'photo'))
        <img src="{{ asset('storage/profile/'.data_get($user, 'photo')) }}" width="80px" class="mb-2">
    @endif

    <form method='post' action="{{route('saveinfo')}}" enctype="multipart/form-data" style='width:30%; margin:0 auto'>
        <div style='text-align:center;font-weight:bold;color:#15c;'>
            CẬP NHẬT THÔNG TIN CÁ NHÂN
        </div>

        <label>Tên</label>
        <input type='text' class='form-control form-control-sm' name='name' value="{{$user->name}}">

        <label>Email</label>
        <input type='text' class='form-control form-control-sm' name='email' value="{{$user->email}}">

        <label>Số điện thoại</label>
        <input type='text' class='form-control form-control-sm' name='phone' value="{{$user->phone ?? ''}}">

        <input type='hidden' value='{{$user->id}}' name='id'>
        <label>Ảnh đại diện</label><br>
         <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">


        @csrf

        <div style='text-align:center;'>
            <input type='submit' class='btn btn-primary mt-1' value='Lưu'>
        </div>
    </form>

</x-account-panel>