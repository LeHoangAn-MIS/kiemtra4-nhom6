<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BookController extends Controller{
    public function sach()
    {
        $data = DB::table("sach")->get();
        return view("index", compact("data"));
    }

    public function theloai($id)
    {
        $data = DB::table("sach")
                ->where("the_loai", $id)
                ->get();

        return view("index", compact("data"));
    }

    function chitiet($id)
    {
        $data = DB::select("select * from sach where id = ?",[$id])[0]; 
        return view("chitiet",compact("data"));
    }
}
