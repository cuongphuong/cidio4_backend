<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use JWTAuth;
use App\User;
use App\DichVu;
use Illuminate\Support\Facades\Validator;
use App\CTHoaDon;

class HoadonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        // $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy']]);
    }

    public function index()
    {
        //
        return response()->json(['message' => 'Code by cuongpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**+
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $validator = Validator::make($request->all(), [
            'id_goi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()], 400);
        }

        try {
            $newitem = HoaDon::create([
                'id_user' => $user->id,
                'id_goi' => $request->get('id_goi'),
                'tinhtrang' => 0,
            ]);

            $newCTHoaDon = CTHoaDon::create([
                'sobantiet' => $request->get('sobantiet'),
                'id_hoadon' => $newitem->id_hoadon,
                'ngaytochuc' => date("Y-m-d H:i:s", strtotime($request->get('ngaytochuc'))),
                'diadiemtochuc' => $request->get('diadiemtochuc'),
                'mota' => $request->get('mota')
            ]);
            // return response()->json(['status' => true, 'data' => $newitem->id_hoadon]);
            return response()->json(['status' => true, 'data' => $newitem, 'cthd' => $newCTHoaDon], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Can\'t create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = HoaDon::find($id);
        if ($res) {
            return response()->json(['status' => true, 'data' => $res], 201);
        } else {
            return response()->json(['status' => false, 'message' => 'Can not get.'], 201);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ngaylaphoadon' => 'required|string|max:255',
            'id_user' => 'string|max:255',
            'id_goi' => 'string|max:255',
            'tinhtrang' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $hoaDonEdit = HoaDon::find($id_hoadon);
            $hoaDonEdit->ngaylaphoadon = $request->get('ngaylaphoadon');
            $hoaDonEdit->id_user = $request->get('id_user');
            $hoaDonEdit->id_goi = $request->get('id_goi');
            $hoaDonEdit->tinhtrang = $request->get('tinhtrang');
            $hoaDonEdit->save();

            return response()->json(['status' => true, 'data' => CTHoaDon::find($hoaDonEdit->id_hoadon)], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Có lổi sảy ra, thử lại sau']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hoaDonDelete = HoaDon::find($id_cthd);
        try {
            $hoaDonDelete->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }

    public function tinhTienHoaGoi(Request $request)
    {
        $strJson = $request->get('obj');
        $obj = json_decode($strJson);
        $arrThucDonCT = array();
        $arrDoUongCT = array();
        $arrKhacCT = array();


        //duyết qua thực đơn
        $tongTienThucDon = 0;
        foreach ($obj->thucdon as $item) {
            $onLyFood = DichVu::find($item);
            array_push($arrThucDonCT, $onLyFood);
        }

        //duyat qua tât cả các đồ uống
        foreach ($obj->douong as $item) {
            $onLyDrink = DichVu::find($item->id);
            $onLyDrink['soluong'] = $item->soluong;
            $onLyDrink['thanhtien'] = $onLyDrink->giatien * $item->soluong;
            array_push($arrDoUongCT, $onLyDrink);
        }

        //duyet qua dich vu bo xung
        foreach ($obj->khac as $item) {
            $onLyKhac = DichVu::find($item);
            array_push($arrKhacCT, $onLyKhac);
        }

        $res = [
            'thucdon' => $arrThucDonCT,
            'douong' => $arrDoUongCT,
            'khac' => $arrKhacCT
        ];

        return response()->json(['status' => true, 'data' => $res]);
    }

}
