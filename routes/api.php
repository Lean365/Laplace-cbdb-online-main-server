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

//Route::get('/altnames', function (Request $request) {
//    $altnames = \App\AltnameCode::select(['c_name_type_code', 'c_name_type_desc_chn'])->where('c_name_type_desc_chn', 'like', '%'.$request->query('q').'%')->get();
//    return $altnames;
//});

Route::middleware('api')->get('/biognames', function (Request $request) {
    $condition=$request->all();
    $names = \App\BiogMain::select(['c_personid', 'c_name', 'c_name_chn'])->where('c_name_chn', 'like', '%'.$request->query('q').'%')->paginate(25);
    $names->appends(['q' => $request->query('q')])->links();
    return $names;
});