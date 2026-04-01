<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderSuccessNotification;

class BookController extends Controller
{
    function sach()
    {
        $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
        return view("vidusach.index", compact("data"));
    }

    function theloai($id)
    {
        $data = DB::select("select * from sach where the_loai = ?", [$id]);
        return view("vidusach.index", compact("data"));
    }

    public function chitiet($id)
    {
        $book = DB::select("select * from sach where id = ?", [$id]);

        return view("vidusach.chitiet", [
            "book" => $book[0] // lấy phần tử đầu
        ]);
    }

public function cartadd(Request $request)
{
    $request->validate([
        "id"=>["required","numeric"],
        "num"=>["required","numeric"]
    ]);
    $id = $request->id;
    $num = $request->num;
    $total = 0;
    $cart = [];
    if(session()->has('cart'))
    {
        $cart = session()->get("cart");
        if(isset($cart[$id]))
            $cart[$id] += $num;
        else
            $cart[$id] = $num ;
    }
    else
    {
        $cart[$id] = $num ;
    }
    session()->put("cart",$cart);
    return count($cart);
    }

public function order()
{
    $cart = [];
    $data = [];
    $quantity = [];

    if(session()->has('cart'))
    {
        $cart = session("cart");

        if (!empty($cart)) {

            $ids = array_keys($cart);

            $quantity = $cart;

            $data = DB::table("sach")
                ->whereIn("id", $ids)
                ->get();
        }
    }

    return view("vidusach.order", compact("quantity", "data"));
}

public function cartdelete(Request $request)
{
    $request->validate([
        "id"=>["required","numeric"]
    ]);
    $id = $request->id;
    $total = 0;
    $cart = [];
    if(session()->has('cart'))
    {
        $cart = session()->get("cart");
        unset($cart[$id]);
    }
    session()->put("cart",$cart);
    return redirect()->route('order');
}

public function ordercreate(Request $request)
{
    $request->validate([
        "hinh_thuc_thanh_toan" => ["required", "numeric"]
    ]);

    $data = [];
    $quantity = [];
    $id_don_hang = null;

    if (session()->has('cart')) {
        $order = [
            "ngay_dat_hang" => DB::raw("now()"),
            "tinh_trang" => 1,
            "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan,
            "user_id" => Auth::user()->id
        ];

        DB::transaction(function () use ($order, &$id_don_hang, &$data, &$quantity) {
            $id_don_hang = DB::table("don_hang")->insertGetId($order);

            $cart = session("cart");
            $list_book = "";

            foreach ($cart as $id => $value) {
                $quantity[$id] = $value;
                $list_book .= $id . ", ";
            }

            $list_book = substr($list_book, 0, strlen($list_book) - 2);

            $data = DB::table("sach")
                ->whereRaw("id in (" . $list_book . ")")
                ->get();

            $detail = [];

            foreach ($data as $row) {
                $detail[] = [
                    "ma_don_hang" => $id_don_hang,
                    "sach_id" => $row->id,
                    "so_luong" => $quantity[$row->id],
                    "don_gia" => $row->gia_ban
                ];
            }

            DB::table("chi_tiet_don_hang")->insert($detail);
        });

        // Chuẩn bị dữ liệu đơn hàng để gửi mail
        $orderInfo = (object) [
            "id" => $id_don_hang,
            "ten_khach_hang" => Auth::user()->name ?? "Khách hàng",
            "dia_chi" => Auth::user()->dia_chi ?? "",
            "so_dien_thoai" => Auth::user()->so_dien_thoai ?? ""
        ];

        $items = collect();

        foreach ($data as $row) {
            $items->push((object) [
                "ten_sach" => $row->ten_sach,
                "so_luong" => $quantity[$row->id],
                "gia" => $row->gia_ban
            ]);
        }

        // Gửi mail theo kiểu bài thực hành 5
        Auth::user()->notify(new OrderSuccessNotification($orderInfo, $items));

        // Xóa giỏ hàng sau khi gửi mail
        session()->forget('cart');
    }

    return view("vidusach.order", compact('data', 'quantity'));
}
}