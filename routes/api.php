<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;
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
Route::middleware('cors')->group(function () {

    Route::post('merchant_info','Api\MerchantApi@addMerchant');//商家信息提交
    Route::post('upload_photo',function () {
        return '正常访问123';
    });//上传图片
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


