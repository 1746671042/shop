<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::get("menu/:isLevel","api/Menu/menuList/");
Route::get("product/:type","api/Product/productlist/");



// 详情
Route::any("html/info/:id","index/index/info");
Route::get("info/:id","api/Info/infoList/");


//前台页面登录
Route::any("html/register","index/index/register");
//登录
Route::get("register/:data","api/Register/regiselect/");
Route::post("yzm","index/index/yzm/");

