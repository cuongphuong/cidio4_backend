<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Package_Service;
use JWTAuth;
use DB;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        // $this->middleware('pg.mod', ['only' => ['getPackage']]);
    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        // $strJson = '{"thucdon":[1,5],"douong":[{"id":4,"soluong":"100"},{"id":6,"soluong":1}],"khac":[1,5]}';
        $strJson = $request->get('obj');
        $obj = json_decode($strJson);
        $user = JWTAuth::toUser($request->input('token'));

        $newPackage = Package::create([
            'id_user' => $user->id
        ]);

        //add thuc don
        foreach ($obj->thucdon as $item) {
            $new = Package_Service::create([
                'id_goi' => $newPackage->id_goi,
                'id_dichvu' => $item,
                'soluong' => 1,
            ]);
        }

        // add do uong
        foreach ($obj->douong as $item) {
            Package_Service::create([
                'id_goi' => $newPackage->id_goi,
                'id_dichvu' => $item->id,
                'soluong' => $item->soluong,
            ]);
        }
        
        // add khac
        foreach ($obj->khac as $item) {
            Package_Service::create([
                'id_goi' => $newPackage->id_goi,
                'id_dichvu' => $item,
                'soluong' => 1,
            ]);
        }

        return response()->json(['status' => true, 'data' => $newPackage]);
    }

    public function show($id)
    {

    }

    public function getPackage($page, $limit)
    {
        if ($page >= 1 && $limit >= 1) {
            $fist = $page * $limit - $limit;
            $last = $page * $limit;
            $sql = "SELECT tb_goi.*, (SELECT SUM(soluong) FROM tb_goi_dichvu WHERE tb_goi_dichvu.id_goi = tb_goi.id_goi) AS soluongdv, (SELECT SUM(tb_goi_dichvu.soluong * (SELECT tb_dichvu.giatien FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu)) as tongtien FROM tb_goi_dichvu WHERE tb_goi_dichvu.id_goi = tb_goi.id_goi) as tongtien, \n"
                . "\n"
                . "IF((SELECT users.id_chucvu FROM users WHERE users.id = tb_goi.id_user) < 2, CONCAT(\"Gói dịch vụ build bởi \", (SELECT users.hoten FROM users WHERE users.id = tb_goi.id_user)) , CONCAT(\"Gói dịch vụ của \", (SELECT users.hoten FROM users WHERE users.id = tb_goi.id_user))) as tengoi\n"
                . "\n"
                . "\n"
                . "from tb_goi INNER JOIN tb_goi_dichvu on (tb_goi.id_goi = tb_goi_dichvu.id_goi) GROUP BY tb_goi.id_goi, tb_goi.id_user, tb_goi.created_at, tb_goi.updated_at, soluongdv, tongtien, tengoi ORDER BY tb_goi.id_goi DESC LIMIT " . $fist . ", " . $last . "";
            $lst = DB::select($sql);
            if ($lst) {
                return response()->json(['status' => true, 'data' => $lst], 201);
            } else {
                return response()->json(['status' => false, 'message' => 'Don\'t get']);
            }
        } else
            return response()->json(['status' => false, 'message' => '$page > 0 and $limit > 1']);
    }

    public function getDetailPackage($idgoi)
    {
        // SELECT tb_goi_dichvu.id_dichvu, (SELECT tb_dichvu.tendichvu FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as tendichvu, (SELECT tb_dichvu.demo FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as demo, (SELECT tb_phanloai_dichvu.id_loaidv FROM tb_phanloai_dichvu INNER JOIN tb_dichvu on(tb_phanloai_dichvu.id_loaidv = tb_dichvu.id_loaidv) WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as loaidv, tb_goi_dichvu.soluong * (SELECT tb_dichvu.giatien FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as giacot, soluong FROM tb_goi_dichvu WHERE tb_goi_dichvu.id_goi = 29
        $sql = "SELECT tb_goi_dichvu.id_dichvu, (SELECT tb_dichvu.tendichvu FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as tendichvu, (SELECT tb_dichvu.mota FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as mota, (SELECT tb_dichvu.demo FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as demo, (SELECT tb_phanloai_dichvu.id_loaidv FROM tb_phanloai_dichvu INNER JOIN tb_dichvu on(tb_phanloai_dichvu.id_loaidv = tb_dichvu.id_loaidv) WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as id_loaidv, tb_goi_dichvu.soluong * (SELECT tb_dichvu.giatien FROM tb_dichvu WHERE tb_dichvu.id_dichvu = tb_goi_dichvu.id_dichvu) as giatien, tb_goi_dichvu.soluong FROM tb_goi_dichvu WHERE tb_goi_dichvu.id_goi = " . $idgoi;

        $data = DB::select($sql);
        if ($data) {
            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false, 'message' => 'Can not get.']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $goi = Package::find($id);
        if ($goi) {
            $goi->delete();
            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } else {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }
}
