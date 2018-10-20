<?php

namespace App\Http\Controllers;

use App\ExternalClass\GetUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'getinfo', 'getinfoByID','getAdmin', 'search', 'getUsers']]);
        $this->middleware('destroy.user', ['only' => ['destroy']]);
        $this->middleware('pg.admin', ['only' => ['getinfoByID']]);
        $this->middleware('pg.mod', ['only' => ['getAdmin', 'search', 'getUsers']]);
        //kiểm tra token với request là update hoặc delete
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        try {
            $validator = Validator::make($request->all(), [
                'sodienthoai' => 'required|string|max:12',
                'hoten' => 'required|string|max:255',
                'password' => 'required|string|min:4',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'command' => 'invalid_form', 'data' => $validator->errors()]);
            }

            $user = User::where('sodienthoai', '=', $request->get('sodienthoai'))->first();
            if ($user != null) {
                return response()->json(['status' => false, 'command' => 'user_exist', 'message' => 'Tài khoản đã tồn tại']);
            }

            $user = User::create([
                'sodienthoai' => $request->get('sodienthoai'),
                'hoten' => $request->get('hoten'),
                'diachi' => null,
                'gioitinh' => null,
                'avatar' => '/upload/avatar-df.png',
                'id_chucvu' => 3,
                'password' => bcrypt($request->get('password')),
            ]);

            $token = JWTAuth::fromUser($user);
            return response()->json(['status' => true, 'data' => compact('user', 'token')]);
        } catch (\Illuminate\Database\QueryException $x) {
            return response()->json(['status' => false, 'message' => $x]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Error']);
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
            'sodienthoai' => 'required|string|max:12',
            'hoten' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()], 400);
        }

        $user = JWTAuth::toUser($request->get('token'));
        $userUpdate = User::where('id', '=', $id)->first();

        if (($user->id_chucvu == 1 && $user->id_chucvu < $userUpdate->id_chucvu) || $user->id == $id) {
            $userUpdate->sodienthoai = $request->get('sodienthoai');
            $userUpdate->hoten = $request->get('hoten');
            $userUpdate->diachi = ($request->get('diachi') != null) ? $request->get('diachi') : $userUpdate->diachi;
            $userUpdate->gioitinh = ($request->get('gioitinh') != null) ? $request->get('gioitinh') : $userUpdate->gioitinh;
            if ($user->id_chucvu == 1) {
                $userUpdate->id_chucvu = ($request->get('id_chucvu') != null) ? $request->get('id_chucvu') : $userUpdate->id_chucvu;
            }
            $userUpdate->save();
            return response()->json(['status' => true, 'message' => 'Update thành công']);
        } else {
            return response()->json(['status' => false, 'message' => 'Không thể cập nhật cho user cùng cấp']);
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
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return response()->json(['status' => true, 'message' => 'Đã xóa khỏi database']);
        } else {
            return response()->json(['status' => false, 'mesage' => 'Không xóa được']);
        }
    }

    public function search($key)
    {
        $user = new GetUser();
        if (is_numeric($key)) {
            return response()->json(['status' => true, 'data' => $user->searchUserByPhone($key)]);
        } else {
            return response()->json(['status' => true, 'data' => $user->searchUserByName($key)]);
        }
    }

    public function getinfo(Request $request)
    {
        $user;
        if (!$user = JWTAuth::toUser($request->get('token'))) {
            return response()->json(['status' => false, 'message' => 'user_not_found']);
        }
        return response()->json(['status' => true, 'user' => $user], 200);
    }

    public function getinfoByID($id)
    {
        $user = User::where('id', '=', $id)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'user_not_found']);
        }
        return response()->json(['status' => true, 'user' => $user], 200);
    }

    public function getUsers($page, $limit)
    {
        if ($page > 0 && $limit > 1) {
            $fist = $page * $limit - $limit;
            $last = $page * $limit;
            $posts = User::skip($fist)->take($last)->orderByRaw('created_at DESC')->get();
            if ($posts) {
                return response()->json(['status' => true, 'data' => $posts], 201);
            } else {
                return response()->json(['status' => false, 'message' => 'Don\'t get']);
            }
        } else
            return response()->json(['status' => false, 'message' => '$page > 0 and $limit > 1']);

    }

    public function getAdmin()
    {
        $posts = User::where('id_chucvu', '<=' , 2)->get();
        if ($posts) {
            return response()->json(['status' => true, 'data' => $posts], 201);
        } else {
            return response()->json(['status' => false, 'message' => 'Don\'t get']);
        }
    }
}
