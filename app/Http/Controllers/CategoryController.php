<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        $this->middleware('pg.mod', ['only' => ['store', 'update', 'destroy']]);
        //kiểm tra token với request là update hoặc delete pg.admin
    }

    public function index()
    {
        return response()->json(['status' => true, 'message' => 'Code by khac huu']);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tentheloai' => 'required|string|max:255',
            'mota' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $newitem = Category::create([
                'tentheloai' => $request->get('tentheloai'),
                'mota' => $request->get('mota'),
            ]);

            return response()->json(['status' => true, 'data' => compact('newitem')], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Can\'t create category']);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tentheloai' => 'required|string|max:255',
            'mota' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        $categoryEdit = Category::find($id);
        $categoryEdit->tentheloai = $request->get('tentheloai');
        $categoryEdit->mota = $request->get('mota');
        $categoryEdit->save();

        return response()->json(['status' => true, 'data' => $categoryEdit], 201);
    }

    public function destroy($id)
    {
        $categoryEdit = Category::find($id);
        try {
            $categoryEdit->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }

    public function getCategoryById($id)
    {
        $category = Category::find($id);
        return response()->json(['status' => true, 'data' => $category]);
    }

    public function getAllCategory()
    {
        $lstCategory = Category::all();
        return response()->json(['status' => true, 'data' => $lstCategory]);
    }
}
