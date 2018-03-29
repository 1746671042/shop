<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Loader;
use phpmailer\phpmailer; 
class Index extends Controller{
    public function index()
    {
         return $this->fetch();
    }
    //调用详情页
     public function info($id)
    {
         $id= $id;
         $this->assign("id",$id);
         return $this->fetch("info");
    }
    //验证码
    public function yzm(){
                $email = input("post.email");
                $yzm = rand(1000, 10000);
                $toemail = $email;//定义收件人的邮箱  
                $mail = new PHPMailer();  
                $mail->isSMTP();// 使用SMTP服务  
                $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码  
                $mail->Host = "smtp.qq.com";// 发送方的SMTP服务器地址  
                $mail->SMTPAuth = true;// 是否使用身份验证  
                $mail->Username ="1746671042@qq.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">;
                $mail->Password = "iytwrhbhwelqbahd";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">  
                $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">  
                $mail->Port = 465;// 163邮箱的ssl协议方式端口号是465/994  

                $mail->setFrom("1746671042@qq.com", "商城官网注册");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示  
                $mail->addAddress($toemail,'Wang');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)  
                $mail->addReplyTo("1746671042@qq.com","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址  
                //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)  
                //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)  
                //$mail->addAttachment("bug0.jpg");// 添加附件  


                $mail->Subject = "商城登陆测试";// 邮件标题  
                $mail->Body = "您的验证码是：".$yzm."，请尽快输入！";// 邮件正文  
                //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用  

                if(!$mail->send()){// 发送邮件  
                    echo "Message could not be sent.";  
                    echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息  
                }else{  
                    echo '验证码发送成功';  
                    $this->assign("yzm",$yzm);
                    return $this->fetch("register");
                }  
                $this->success("信息登录成功，请输入验证码","index/index/index");
    }
    
    public function register(){
        
        if(Request::instance()->isPost()){
            $data = input("post.");
            $yzm = input("post.yzm");
           
            $validate = Loader::validate('User');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $data["status"]=1;
                $sel = model("User")->where("email",$data["email"])->find();
                if($sel){
                    $this->error("email已被注册");
                }else{
                    if($data["yzm"]!=$yzm){
                        
                        $this->error("验证码不正确");
                    }else{
                        if(model("User")->except("register_type,confirm,agree")->save($data)){
                           $this->success("注册成功","index/index/index");
                        }else{
                           $this->error("注册失败");
                        };
                }
                
            }
            if($data!=[]){
            }
            $this->assign("data",$data);
            return $this->fetch("register");
        }
        }else{
           return $this->fetch("register"); 
        }
        
    }
    
    
}
