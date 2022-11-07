<?php
$action="registration";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
  case 'registration':
    if (isset($_SESSION['makh'])) {
      echo '<script>alert("Đăng nhập rồi tìm vào đăng ký chi nữa")</script>';
      include 'View/home.php';
  }
    include 'View/registration.php';
    break;
  case 'registration_action':
    
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $tenkh=$_POST['txttenkh'];
      $username=$_POST['txtusername'];
      $password=$_POST['txtpass'];
      $crypt=md5($password);
      $email=$_POST['txtemail'];
      $diachi=$_POST['txtdiachi'];
      $sodt=$_POST['txtsodt'];
      $ur=new User();
      $result=$ur->checkDuplicateMail($email);
      $checkphone=$ur->checkDuplicatePhone($sodt);
      if ($result['count']!=0 ) {
        echo '<script>alert("Email đã tồn tại bạn không thể tạo tài khoản với email này")</script>';
        // include "view/registration.php";
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=registration"/>';
      }elseif($checkphone['countPhone']!=0){
        echo '<script>alert("Số điện thoại đã tồn tại bạn không thể tạo tài khoản với số điện thoại này")</script>';
        // include "view/registration.php";
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=registration"/>';
        
      }
      else{
        
        $ur->InsertUser($tenkh,$username,$crypt,$email,$diachi,$sodt); 
        echo "<script>alert('Tạo tài khoản thành công')</script>" ;
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
      }

    }
    // include 'View/home.php';
    break;

}
?>