<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data = DB::table('dm_the_loai')->get();
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.them');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_the_loai' => ['required', 'string', 'max:255'],
        ]);

        DB::table('dm_the_loai')->insert([
            'ten_the_loai' => $request->ten_the_loai
        ]);

        return redirect()->route('danhmuc')->with('status', 'Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $item = DB::table('dm_the_loai')->where('id', $id)->first();
        return view('category.sua', compact('item'));
    }

    public function update(Request $request)
    {
        DB::table('dm_the_loai')->where('id',$request->id)->update([
            'ten_the_loai' => $request->ten_the_loai
        ]);

        return redirect()->route('danhmuc')->with('status', 'Cập nhật danh mục thành công');
    }

    public function delete($id)
    {
        DB::table('dm_the_loai')->where('id', $id)->delete();
        
        return redirect()->route('danhmuc')->with('status', 'Xóa danh mục thành công');
    }
}
