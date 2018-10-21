<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class ChucVuController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'getUserByIDChucVu']]);
        $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy', 'getUserByIDChucVu']]);
        //kiểm tra token với request là update hoặc delete pg.admin
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['message' => 'index']);
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
        $validator = Validator::make($request->all(), [
            'tenchucvu' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()], 400);
        }

        try {
            $newitem = ChucVu::create([
                'tenchucvu' => $request->get('tenchucvu'),
            ]);
            return response()->json(['status' => true, 'data' => compact('newitem')], 201);
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
        //
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
            'tenchucvu' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()], 400);
        }

        $user = JWTAuth::toUser($request->get('token'));
        $chucVuUpdate = ChucVu::where('id_chucvu', '=', $id)->first();

        try {
            $chucVuUpdate->tenchucvu = $request->get('tenchucvu');
            $userUpdate->save();
            return response()->json(['status' => true, 'message' => 'Update thành công']);
        } catch (Exception $e) {
            return response()->json(['status' => true, 'message' => 'Update thất bại']);
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
        $chucvuDestroy = ChucVu::whereRaw('id_chucvu =' . $id)->first();
        if ($chucvuDestroy != null) {
            $chucvuDestroy->delete();
            return response()->json(['status' => true, 'message' => 'Đã xóa khỏi database']);
        } else {
            return response()->json(['status' => false, 'mesage' => 'Không xóa được']);
        }
    }

    public function getUserByIDChucVu($id){
        $lst = User::whereRaw('id_chucvu =' . $id)->get();
        if(count($lst) > 0){
            return response()->json(['status' => true, 'data' => $lst]);
        } else {
            return response()->json(['status' => false, 'message' => 'Response is null']);
        }
    }
}
