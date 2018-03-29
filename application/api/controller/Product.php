<?php
namespace app\api\controller;
use think\Controller;
use app\api\model\Product as ProductModel;;
class Product extends Controller{
    //获取商品列表
    /**
     * hot 最热 new 最新  list 获取列表
     * num 获取条数
     * typeid 分类id 默认为0
     * page 页数  默认1
     */
   public function productlist($type,$num=2,$typeId =0, $page = 1){
       //验证数据
       if(!in_array($type,['hot', 'new','list'])){
           return["status"=>100,"data"=>[],"msg"=>"请求参数错误"];
       }
       $ProductModel = new ProductModel();
       //查询数据
       $ProductModel->where(["quantity"=>[">",0],"is_sale"=>"1"]);
       if($type =="hot"){
            $ProductModel->order("sort desc");
       }
       if($type =="new"){
            $ProductModel->order("id desc");
       }
       if($type == "list"){
           $ProductModel->where("category_id",$typeId);
       }
       $list = $ProductModel->paginate($num)->toArray();

//       if($type =="hot"){
//           $list = $ProductModel->where(["quantity"=>[">",0],"is_sale"=>"1"])->order("sort desc")->limit(0,$num)->select();
//       }else if($type =="new"){
//           $list = $ProductModel->where(["quantity"=>[">",0],"is_sale"=>"1"])->order("id desc")->limit(0,$num)->select();
//       }else{
//           $list = $ProductModel->where(["quantity"=>[">",0],"is_sale"=>"1","category_id"=>$typeId ])->order("sort desc")->paginate($num);
//       }
       return["status"=>200,"data"=>$list,"msg"=>""];
   }
}
