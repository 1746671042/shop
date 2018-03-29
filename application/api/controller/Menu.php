<?php
 namespace app\api\controller;
 use think\Controller;
 use app\api\model\Type;
 class Menu extends Controller{
//     获取menu列表 islevel 是否分级
     public function menuList($isLevel=1){
         //是否划分导航几倍
         $isLevel = input("param.isLevel/d",0);
         if($isLevel !=0 && $isLevel != 1){
              return ["status"=>100,"data"=>[],"msg"=>"请求参数错误"];
         }
         $typeModel = new Type();
         $list = Type::all()->toArray();
         if($isLevel ==1){
             $list = $typeModel->menuList($list);
         }
         return ["status"=>200,"data"=>$list,"msg"=>""];
     }
     
     public function productlist(){
         
     }
 }