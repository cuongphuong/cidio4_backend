<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Package_Service;
use JWTAuth;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['update', 'destroy', 'store']]);
        // $this->middleware('pg.mod', ['only' => ['store', 'update', 'destroy']]);
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

        return response()->json(['status' => true]);
    }

    public function show($id)
    {
        //
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
        //
    }
}
