<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kiemtra1Controller extends Controller
{
    public function kiemtra1()
    {
        return view('kiemtra1');
    }

    public function tinhtuoi(Request $request)
    {
        $nam_sinh = $request->input('nam_sinh');
        $nam_hien_tai = date('Y');
        $tuoi = $nam_hien_tai - $nam_sinh;

        return "Năm nay tuổi của bạn là: " . $tuoi . " tuổi";
    }
}