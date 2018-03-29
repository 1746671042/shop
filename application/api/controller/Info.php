<?php
 namespace app\api\controller;
 use think\Controller;
use app\api\model\Product;
 class Info extends Controller{
//     获取menu列表 islevel 是否分级
     public function infoList($id){
         if($id!=""){
           $Product = new Product();
           $list = $Product->where("id",$id)->select();
           if($list){
               return["status"=>200,"data"=>$list,"msg"=>""];
           }else{
               return["status"=>100,"data"=>[],"msg"=>"请求参数错误"];
           }
         }
     }
 }