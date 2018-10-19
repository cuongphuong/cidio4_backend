<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        // $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy']]);
    }

    public function thongKeDoanhThuTheoThang($nam)
    {
        $res = array();

        for ($i = 1; $i < 13; $i++) {
            $sql = "SELECT SUM(tongtien) as x FROM tb_hoadon WHERE tinhtrang = 0 AND YEAR(created_at) = " . $nam . " AND MONTH(created_at) = " . $i;
            $lst = DB::select($sql);
            $dataThang = [
                'name' => 'Tháng ' . $i, 
                'value' =>($lst[0]->x == null) ? 0 : $lst[0]->x
            ];
            array_push($res, $dataThang);
        }

        return response()->json($res);
    }

    public function thongKeDoanhAllNam($nam)
    {
        $res = array();

        for ($i = $nam; $i < date("Y"); $i++) {
            $sql = "SELECT SUM(tongtien) as x FROM tb_hoadon WHERE tinhtrang = 1 AND YEAR(created_at) = " . $nam;
            $lst = DB::select($sql);
            $dataNam = [
                'name' => 'Tháng ' . $i, 
                'Doanh thu' =>($lst[0]->x == null) ? 0 : $lst[0]->x
            ];
            array_push($res, $dataNam);
        }

        return response()->json($res);
    }



    ///////////////////////////////////////////////////////////
    public function thongkeDonHangTheoThang($nam)
    {
        $res = array();

        for ($i = 1; $i < 13; $i++) {
            $sql = "SELECT COUNT(*) as x FROM tb_hoadon WHERE MONTH(created_at) = " . $i;
            $lst = DB::select($sql);
            $dataThang = [
                'name' => 'Tháng ' . $i, 
                'Đơn hàng' =>($lst[0]->x == null) ? 0 : $lst[0]->x
            ];
            array_push($res, $dataThang);
        }

        return response()->json($res);
    }

    public function thongKeDonHangTheoNam($nam)
    {
        $res = array();

        for ($i = $nam; $i < date("Y"); $i++) {
            $sql = "SELECT COUNT(*) as x FROM tb_hoadon WHERE YEAR(created_at) = " . $i;
            $lst = DB::select($sql);
            $dataNam = [
                'name' => 'Tháng ' . $i, 
                'Đơn hàng' =>($lst[0]->x == null) ? 0 : $lst[0]->x
            ];
            array_push($res, $dataNam);
        }

        return response()->json($res);
    }
}
