<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\DichVu;

class DichVuController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy']]);
        //kiểm tra token với request là update hoặc delete pg.admin
    }

    public function index()
    {
        return response()->json(['status' => true, 'message' => 'Code by Cuongpg']);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $validator = Validator::make($request->all(), [
            'tendichvu' => 'required|string|max:255',
            'mota' => 'string|max:255',
            'giatien' => array('required', 'regex:' . $regex),
            'id_loaidv' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        $path = null;

        if ($request->hasFile('demo')) {
            $file = $request->demo;
            $path = $file->move('upload', $file->getClientOriginalName());
        }

        try {
            $newitem = DichVu::create([
                'tendichvu' => $request->get('tendichvu'),
                'mota' => $request->get('mota'),
                'demo' => ($path != null) ? $path : '',
                'giatien' => $request->get('giatien'),
                'id_loaidv' => $request->get('id_loaidv'),
            ]);

            return response()->json(['status' => true, 'data' => DichVu::find($newitem->id_dichvu)], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Không thể tạo phân loại']);
        }
    }

    public function show($id)
    {
        $res = DichVu::find($id);
        if ($res) {
            return response()->json(['status' => true, 'data' => $res]);
        } else {
            return response()->json(['status' => false, 'data' => 'Can not find ' . $id]);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $validator = Validator::make($request->all(), [
            'tendichvu' => 'required|string|max:255',
            'mota' => 'string|max:255',
            'giatien' => array('required', 'regex:' . $regex),
            'id_loaidv' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        $path = null;

        if ($request->hasFile('demo')) {
            $file = $request->demo;
            $path = $file->move('upload', $file->getClientOriginalName());
        }

        try {
            $dichVuEdit = DichVu::find($id);
            $dichVuEdit->tendichvu = $request->get('tendichvu');
            $dichVuEdit->mota = $request->get('mota');
            $dichVuEdit->demo = ($path != null) ? $path : $dichVuEdit->demo;
            $dichVuEdit->giatien = $request->get('giatien');
            $dichVuEdit->id_loaidv = $request->get('id_loaidv');
            $dichVuEdit->save();

            return response()->json(['status' => true, 'data' => DichVu::find($dichVuEdit->id_dichvu)], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Có lổi sảy ra, thử lại sau']);
        }
    }

    public function destroy($id)
    {
        $dichVuDelete = DichVu::find($id);
        try {
            $dichVuDelete->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }

    public function getDichVuByPhanLoai($idLoaiDV)
    {
        $lstDV = DichVu::where('id_loaidv', '=', $idLoaiDV)->get();
        if ($lstDV) {
            return response()->json(['status' => true, 'data' => $lstDV]);
        } else {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy dịch vụ nào.']);
        }
    }

    public function searchByTenDichVu($key)
    {
        $builder = DichVu::query();
        if (isset($key)) {
            if ($key != null && trim($key) != '') {
                $builder->where('tendichvu', 'LIKE', "%$key%");
            }
            // ... more clauses from the querystring
            $services = $builder->orderBy('tendichvu')->paginate(5);
            if (count($services) > 0) {
                return response()->json(['status' => true, 'data' => $services]);
            } else {
                return response()->json(['status' => false, 'data' => 'Can not find ' . $key]);
            }
        }
    }

}
