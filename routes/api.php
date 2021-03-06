<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// AuthController
Route::post('auth/login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('auth/refesh', 'AuthController@refreshToken');
    Route::get('auth/logout', 'AuthController@logout');
});

// ChucVuController
Route::resource('chucvu', 'ChucVuController');
Route::get('users-by-chucvu/{id}', 'ChucVuController@getUserByIDChucVu');

// UserController
Route::resource('users', 'UserController');
Route::post('users/me', 'UserController@getinfo');
Route::get('users/get/{id}', 'UserController@getinfoByID');
Route::get('users/admin/get', 'UserController@getAdmin');
Route::get('users/get-page/{page}/{limit}', 'UserController@getUsers');

// CategoryController
Route::resource('categorys', 'CategoryController');
Route::get('categorys/get/{id}', 'CategoryController@getCategoryById');
Route::get('all/categorys', 'CategoryController@getAllCategory');

// PostController
Route::resource('posts', 'PostController');
Route::get('posts/getpage/{page}/{limit}', 'PostController@getPostByPaging');
Route::get('posts/getcate/{id}/{page}/{limit}', 'PostController@getPostByIdCategory');
Route::get('posts/getuser/{id}/{page}/{limit}', 'PostController@getPostByIdUser');
Route::get('posts/search/{key}', 'PostController@searchPost');

// PhanLoaiDichVuController
Route::resource('sercate', 'PhanLoaiDichVuController');
Route::get('all/sercate', 'PhanLoaiDichVuController@getAll');

// DichVuController
Route::resource('service', 'DichVuController');
Route::get('/service/getsercate/{idLoaiDV}', 'DichVuController@getDichVuByPhanLoai');
Route::get('/service/search/{key}', 'DichVuController@searchByTenDichVu');


//
Route::resource('package', 'PackageController');
Route::get('/get/package/{page}/{limit}', 'PackageController@getPackage');
Route::get('/get/package-admin/{page}/{limit}', 'PackageController@getPackageAdmin');
Route::get('/get-detail/package/{id}', 'PackageController@getDetailPackage');

//
Route::resource('infosystem', 'InfosystemController');

Route::resource('chitietHoaDon', 'CTHoaDonController');

// HoaDonCOntroller
Route::resource('hoadon', 'HoadonController');
Route::post('hoadon/gethodon', 'HoadonController@tinhTienHoaGoi');
Route::get('not-agree/hoadon', 'HoadonController@getHoaDonChuaXacNhan');
Route::get('info/hoadon/{idhd}', 'HoadonController@getInfoHoaDon');
Route::get('change-tinh-trang/hoadon/{idhd}', 'HoadonController@thayDoiTinhTrang');

//ThongKeController
Route::get('/thongke/coban', 'ThongKeController@ThongKeCoBan');

Route::get('/thongke/doanhthu/thang/{nam}', 'ThongKeController@thongKeDoanhThuTheoThang');
Route::get('/thongke/doanhthu/nam/{tunam}/{dennam}', 'ThongKeController@thongKeDoanhAllNam');

Route::get('/thongke/donhang/thang/{objNam}', 'ThongKeController@thongkeDonHangTheoThang');
Route::get('/thongke/donhang/nam/{tunam}/{dennam}', 'ThongKeController@thongKeDonHangTheoNam');
Route::get('/thongke/donhangngay/{ngay}/{thang}/{nam}', 'ThongKeController@getDonHangTheoNgay');