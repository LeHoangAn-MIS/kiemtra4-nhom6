<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BookController1 extends Controller
{
function laythongtintheloai()
{
$the_loai_sach = Category::all();
return view("qlsach.the_loai",compact("the_loai_sach"));
}
function laythongtinsach()
{
    $the_loai = "Tác phẩm kinh điển";

    $sach = DB::select("
        SELECT s.tieu_de, s.nha_xuat_ban, s.tac_gia, s.gia_ban, s.link_anh_bia
        FROM sach s
        JOIN dm_the_loai t ON s.the_loai = t.id
        WHERE t.ten_the_loai = ?
    ", [$the_loai]);

    return view("qlsach.thong_tin_sach", compact("sach"));
}
function themtheloai()
{
    $data = [
["id"=>4,"ten_the_loai"=>"Trinh thám"],
["id"=>5,"ten_the_loai"=>"Văn học"],
];
DB::table("dm_the_loai")->insert($data);

    return "Thêm thành công";
}

}
