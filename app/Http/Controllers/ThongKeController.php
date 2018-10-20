<?php

namespace App\Http\Controllers;

use DB;
use App\HoaDon;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        // $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy']]);
    }

    public function ThongKeCoBan(){
        $res = array();
        $tongDoanhThu = DB::table('tb_hoadon')->sum('tongtien');
        $doanhThuTrongThang = DB::table('tb_hoadon')->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->sum('tongtien');
        $res['doanhthu']['tong'] = $tongDoanhThu;
        $res['doanhthu']['thang'] = $doanhThuTrongThang;

        //donhang
        $tongDonHang = DB::table('tb_hoadon')->count('*');
        $donTrongThang = DB::table('tb_hoadon')->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count('*');
        $res['donhang']['tong'] = $tongDonHang;
        $res['donhang']['thang'] = $donTrongThang;

        //thanhvien
        $tongThanhVien = DB::table('users')->count('*');
        $dkTrongThang = DB::table('users')->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count('*');
        $res['users']['tong'] = $tongThanhVien;
        $res['users']['thang'] = $dkTrongThang;


        //goi
        $tongGoi = DB::table('tb_goi')->count('*');
        $res['goi']['tong'] = $tongGoi;

        return response()->json($res);
    }

    public function thongKeDoanhThuTheoThang($nam)
    {
        $res = array();

        for ($i = 1; $i < 13; $i++) {
            $sql = "SELECT SUM(tongtien) as x FROM tb_hoadon WHERE tinhtrang = 0 AND YEAR(created_at) = " . $nam . " AND MONTH(created_at) = " . $i;
            $lst = DB::select($sql);
            $dataThang = [
                'name' => 'Tháng ' . $i,
                $nam => ($lst[0]->x == null) ? 0 : $lst[0]->x
            ];
            array_push($res, $dataThang);
        }

        return response()->json($res);
    }

    public function thongKeDoanhAllNam($tunam, $dennam)
    {
        $res = array();

        for ($i = $tunam; $i <= $dennam; $i++) {
            $sql = "SELECT SUM(tongtien) as x FROM tb_hoadon WHERE tinhtrang = 0 AND YEAR(created_at) = " . $i;
            $lst = DB::select($sql);
            $dataNam = [
                'name' => 'Năm ' . $i,
                'value' => ($lst[0]->x == null) ? 0 : $lst[0]->x
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
                'Đơn hàng' => ($lst[0]->x == null) ? 0 : $lst[0]->x
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
                'Đơn hàng' => ($lst[0]->x == null) ? 0 : $lst[0]->x
            ];
            array_push($res, $dataNam);
        }

        return response()->json($res);
    }
}
