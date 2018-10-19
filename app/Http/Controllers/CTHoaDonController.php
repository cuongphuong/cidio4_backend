<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CTHoaDon;
use Illuminate\Support\Facades\Validator;
class CTHoaDonController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'id_hoadon' => 'required',
            'ngaytochuc'=> 'string|max:255',
            'diadiemtochuc'=> 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()], 400);
        }

        try {
            $newitem = Post::create([
                'id_hoadon' => $request->get('id_hoadon'),
                'ngaytochuc' => $request->get('ngaytochuc'),
                'diadiemtochuc' => $request->get('diadiemtochuc'),
                'khonggianmau' => $request->get('khonggianmau'),
            ]);

            return response()->json(['status' => true, 'data' => $newitem], 201);
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
        $res = CTHoaDon::find($id);
        if($res){
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
            'id_hoadon' => 'required|string|max:255',
            'ngaytochuc'=> 'string|max:255',
            'diadiemtochuc'=> 'string|max:255',
            'khonggianmau'=> 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $ctHoaDonEdit = CTHoaDon::find($id_cthd);
            $ctHoaDonEdit->id_hoadon = $request->get('id_hoadon');
            $ctHoaDonEdit->ngaytochuc = $request->get('ngaytochuc');
            $ctHoaDonEdit->diadiemtochuc = $request->get('diadiemtochuc');
            $ctHoaDonEdit->khonggianmau = $request->get('khonggianmau');
            $infosystemEdit->save();

            return response()->json(['status' => true, 'data' => CTHoaDon::find($ctHoaDonEdit->id_cthd)], 201);
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
        //
        $ctHoaDonDelete = CTHoaDon::find($id_cthd);
        try {
            $ctHoaDonDelete->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }


}
