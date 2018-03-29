<?php
namespace app\index\validate;
use think\Validate;
class User extends Validate{
    protected $rule = [
        //
       'email|邮箱'  =>  'email|require|length:10,17',
       'name|用户名'  =>  'require|min:3',
       'password|密码' =>  'require|length:6,25|confirm:confirm',
       'confirm|重复密码' =>  'require|length:6,25|confirm:password',
    ];
    
}
