<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\User;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        $this->middleware('pg.mod', ['only' => ['store', 'update', 'destroy']]);
        $this->middleware('destroy.post', ['only' => ['update', 'destroy']]);
        //destroy.post
    }

    public function index()
    {
        return response()->json(['status' => true, 'message' => 'Code by Cuongpg']);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $validator = Validator::make($request->all(), [
            'tieude' => 'required|string|max:255',
            'noidung' => 'required|string',
            'id_theloai' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $newitem = Post::create([
                'tieude' => $request->get('tieude'),
                'noidung' => $request->get('noidung'),
                'id_user' => $user->id,
                'id_theloai' => $request->get('id_theloai'),
            ]);

            return response()->json(['status' => true, 'data' => $newitem], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Can\'t add new post']);
        }
    }


    public function show($id)
    {
        $sql = "SELECT tb_baiviet.*, (SELECT users.hoten FROM users WHERE users.id = tb_baiviet.id_user) as tenthanhvien, (SELECT tb_theloai.tentheloai FROM tb_theloai WHERE tb_theloai.id_theloai = tb_baiviet.id_theloai) as tentheloai FROM tb_baiviet WHERE tb_baiviet.id_baiviet = " . $id;
        $res = DB::select($sql);

        // $res = Post::find($id);
        if ($res) {
            return response()->json(['status' => true, 'data' => $res[0]]);
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
        $validator = Validator::make($request->all(), [
            'tieude' => 'required|string|max:255',
            'noidung' => 'required|string',
            'id_theloai' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        try {
            $postEdit = Post::find($id);
            $postEdit->tieude = $request->get('tieude');
            $postEdit->noidung = $request->get('noidung');
            $postEdit->id_theloai = $request->get('id_theloai');
            $postEdit->save();

            return response()->json(['status' => true, 'data' => $postEdit], 201);
        } catch (Exception $x) {
            return response()->json(['status' => false, 'message' => 'Có lổi sảy ra, thử lại sau']);
        }
    }


    public function destroy($id)
    {
        $postDelete = Post::find($id);
        try {
            $postDelete->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }

    public function getPostByPaging($page, $limit)
    {
        if ($page > 0 && $limit > 1) {
            $fist = $page * $limit - $limit;
            $last = $page * $limit;
            $sql = "SELECT tb_baiviet.*, (SELECT users.hoten FROM users WHERE users.id = tb_baiviet.id_user) as tenthanhvien, (SELECT tb_theloai.tentheloai FROM tb_theloai WHERE tb_theloai.id_theloai = tb_baiviet.id_theloai) as tentheloai FROM tb_baiviet LIMIT " . $fist . ", " . $last . "";
            $posts = DB::select($sql);
            if ($posts) {
                return response()->json(['status' => true, 'data' => $posts], 201);
            } else {
                return response()->json(['status' => false, 'message' => 'Don\'t get']);
            }
        } else
            return response()->json(['status' => false, 'message' => '$page > 0 and $limit > 1']);
    }

    public function getPostByIdCategory($id, $page, $limit)
    {
        if ($page > 0 && $limit > 1) {
            $fist = $page * $limit - $limit;
            $last = $page * $limit;
            $posts = Post::where('id_theloai', '=', $id)->skip($fist)->take($last)->get();
            if ($posts) {
                return response()->json(['status' => true, 'data' => $posts], 201);
            } else {
                return response()->json(['status' => false, 'message' => 'Don\'t get']);
            }
        } else
            return response()->json(['status' => false, 'message' => '$page > 0 and $limit > 1']);
    }

    public function getPostByIdUser($id, $page, $limit)
    {
        $user = User::find($id);
        if ($user->id_chucvu <= 2) {
            if ($page > 0 && $limit > 1) {
                $fist = $page * $limit - $limit;
                $last = $page * $limit;
                $posts = Post::where('id_user', '=', $id)->skip($fist)->take($last)->get();
                if ($posts) {
                    return response()->json(['status' => true, 'data' => $posts], 201);
                } else {
                    return response()->json(['status' => false, 'message' => 'Don\'t get']);
                }
            } else
                return response()->json(['status' => false, 'message' => '$page > 0 and $limit > 1']);

        } else {
            return response()->json(['status' => false, 'message' => 'User don\'t not post']);
        }
    }

    public function searchPost($key)
    {
        $builder = Post::query();
        if (isset($key)) {
            if ($key != null && trim($key) != '') {
                $builder->where('tieude', 'LIKE', "%$key%");
            }
            // ... more clauses from the querystring
            $lstPosts = $builder->orderBy('id_baiviet')->paginate(5);
            return response()->json(['status' => true, 'data' => $lstPosts]);
        } else
            return response()->json(['status' => false, 'data' => 'Can not find ' . $key]);
    }
}
