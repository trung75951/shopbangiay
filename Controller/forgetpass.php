
<?php

require 'models/Exception.php';
require 'models/PHPMailer.php';
require 'models/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$action="forgetpass";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "forgetpass":
        include "views/forgetpass.php";
        break;
    case "forgetpass_action":
        if(isset($_POST['submit_email']) && !empty($_POST['email']))
        {
            $getemail=$_POST['email'];
            $ur=new User();
            $result=$ur->getEmail($getemail);
            
            if($result==0){
                echo '<script> alert ("Email không có liên kết tài khoản, Vui lòng kiểm tra lại!")</script>';
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
            }else{
                // lấy ra email và pass trên data
                $email=md5($result['email_kh']);
                $pass=md5($result['pass_dn']);
                $link="<a href='http://shopgiay.local/index.php?action=forgetpass&act=resetpass&key=".$email."&reset=".$pass."'>Reset password</a>";
                // setting mailer
                $mail = new PHPMailer(true);
                $mail->IsSMTP(); // telling the class to use SMTP
                //$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server

                // $mail->SMTPDebug  = 1;
                $mail->Host       = "smtp.gmail.com";
                $mail->SMTPAuth   = true;
                $mail->Username = "quantrivien003@gmail.com";
                $mail->Password = "qridcydfjfzrwlch";
                $mail->SMTPSecure ='tls';
                $mail->Port       = '587';
                // 
                $mail->SetFrom('quantrivien003@gmail.com', 'Admin');
                $mail->AddAddress($getemail, "reciever_name");
                //$mail->AddReplyTo("user2@gmail.com', 'First Last");

                $mail->IsHTML(true);
                $mail->Subject= 'Reset Password';
                $mail->Body = 'Nhấn vào link để đặt lại mật khẩu '.$link;
                // $mail->AltBody    = 'Nhấn vào link để đặt lại mật khẩu!';
                // $mail->MsgHTML($body);
                
                if($mail->Send())
                {
                    echo '<script> alert ("Đã gửi đường link đặt mật khẩu qua Mail của bạn!")</script>';
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home"/>';
                }
                else
                {
                    echo '<script> alert ("Mail Error")</script>';
                    // var_dump($mail);
                    echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
                }
            }
        }else{
            echo '<script> alert ("Vui lòng không bỏ trống !")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=forgetpass"/>';
        }
        break;
    case "resetpass":
        include "views/resetpass.php";
        break;
    case "updatepass":
        if(isset($_POST['submit_password']))
        {
            $passnew=md5($_POST['password']);
            $emailold=$_POST['email'];
            $ur=new User();
            $ur->updateEmail($emailold,$passnew);
            echo'<script> alert("Thay đổi mật khẩu thành công");</script>';
        }
        include "views/login.php";
        break;
}
?>