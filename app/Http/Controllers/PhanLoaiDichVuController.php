<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhanLoaiDichVu;
use Illuminate\Support\Facades\Validator;
use DB;

class PhanLoaiDichVuController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy']]);
        //kiểm tra token với request là update hoặc delete pg.admin
    }
    public function index()
    {
        return response()->json(['status' => true, 'message' => 'index']);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenloaidv' => 'required|string|max:255',
            'mota' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $newitem = PhanLoaiDichVu::create([
                'tenloaidv' => $request->get('tenloaidv'),
                'mota' => $request->get('mota'),
            ]);

            return response()->json(['status' => true, 'data' => $newitem], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Không thể tạo phân loại']);
        }
    }

    public function show($id)
    {
        $res = PhanLoaiDichVu::find($id);
        if($res){
            return response()->json(['status' => true, 'data' => $res], 201);
        } else {
            return response()->json(['status' => false, 'message' => 'Can not get.'], 201);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tenloaidv' => 'required|string|max:255',
            'mota' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $phanLoaiEdit = PhanLoaiDichVu::find($id);
            $phanLoaiEdit->tentheloai = $request->get('tentheloai');
            $phanLoaiEdit->mota = $request->get('mota');
            $phanLoaiEdit->save();

            return response()->json(['status' => true, 'data' => $phanLoaiEdit], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Có lổi sảy ra, thử lại sau']);
        }
    }

    public function destroy($id)
    {
        $phanLoaiDelete = PhanLoaiDichVu::find($id);
        try {
            $phanLoaiDelete->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }

    public function getAll()
    {
        // SELECT tb_phanloai_dichvu.*, (SELECT COUNT(*) FROM tb_dichvu WHERE tb_dichvu.id_loaidv = tb_phanloai_dichvu.id_loaidv) as sodv, (SELECT COUNT(*) FROM tb_goi_dichvu WHERE id_loaidv = tb_phanloai_dichvu.id_loaidv) as dichvusd, ((SELECT COUNT(*) FROM tb_goi_dichvu WHERE id_loaidv = tb_phanloai_dichvu.id_loaidv) / (SELECT COUNT(*) FROM tb_dichvu WHERE tb_dichvu.id_loaidv = tb_phanloai_dichvu.id_loaidv))*100 as phantram FROM tb_phanloai_dichvu
        $sql = "SELECT tb_phanloai_dichvu.*, (SELECT COUNT(*) FROM tb_dichvu WHERE tb_dichvu.id_loaidv = tb_phanloai_dichvu.id_loaidv) as sodv, (SELECT COUNT(*) FROM tb_goi_dichvu WHERE id_loaidv = tb_phanloai_dichvu.id_loaidv) as dichvusd, ((SELECT COUNT(*) FROM tb_goi_dichvu WHERE id_loaidv = tb_phanloai_dichvu.id_loaidv) / (SELECT COUNT(*) FROM tb_dichvu WHERE tb_dichvu.id_loaidv = tb_phanloai_dichvu.id_loaidv))*100 as phantram FROM tb_phanloai_dichvu";
        $lst = DB::select($sql);
        if ($lst != null) {
            return response()->json(['status' => true, 'data' => $lst]);
        } else {
            return response()->json(['status' => false, 'message' => 'Can not get.']);
        }
    }
}
