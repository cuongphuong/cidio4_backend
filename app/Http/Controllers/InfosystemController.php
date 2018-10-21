<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infosystem;
use Illuminate\Support\Facades\Validator;
class InfosystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        $this->middleware('pg.admin', ['only' => ['store', 'update', 'destroy']]);
        //kiểm tra token với request là update hoặc delete pg.admin
    }

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
            'title' => 'required|string|max:255',
            'domain'=> 'string|max:255',
            'description'=> 'string|max:255',
            'keyword'=> 'required|string|max:255',
            'author'=> 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()], 400);
        }

        try {
            $newitem = Infosystem::create([
                'title' => $request->get('title'),
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
        $res = Infosystem::find($id);
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
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'domain' => 'string|max:255',
            'description' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'data' => $validator->errors()]);
        }

        $path = null;

        if ($request->hasFile('title')) {
            $file = $request->title;
            $path = $file->move('upload', $file->getClientOriginalName());
        }

        try {
            $infosystemEdit = Infosystem::find($id);
            $infosystemEdit->title = $request->get('title');
            $infosystemEdit->domain = $request->get('domain');
            $infosystemEdit->description = $request->get('description');
            $infosystemEdit->keyword = $request->get('keyword');
            $infosystemEdit->author = $request->get('author');
            $infosystemEdit->save();

            return response()->json(['status' => true, 'data' => Infosystem::find($infosystemEdit->id)], 201);
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
        $infosystemDelete = Infosystem::find($id);
        try {
            $infosystemDelete->delete();

            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 201);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Xóa thất bại']);
        }
    }
}
