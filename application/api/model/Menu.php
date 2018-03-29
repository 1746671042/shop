<?php
namespace app\api\model;
use think\Model;
class Menu extends Model{
    //自动写入时间戳
    protected $autoWriteTimestamp = true;
    //输出数据转换
    protected  $resultSetType = 'collection';
    
}