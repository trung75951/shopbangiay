<?php
class User
{
  var $makh = 0;
  var $tenkh = null;
  var $user = null;
  var $pass = null;
  var $email = null;
  var $diachi = null;
  var $sodt = null;
  var $vaitro = 0;
  public function __construct()
  {
  }
  function InsertUser($tenkh, $user, $matkhau, $email, $diachi, $dt)
  {
    $db = new connect();
    $query = "insert into khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro,tinhtrang)
    values(NULL,'$tenkh','$user','$matkhau','$email','$diachi','$dt','normal',1)";
    $db->getexec($query);
  }

  function login($email, $pass, $phone)
  {
    $db = new connect();
    $select = "select * from khachhang where (email='$email' and matkhau='$pass') or (sodienthoai='$phone' and matkhau='$pass')";
    $result = $db->getList($select);
    $set = $result->fetch();
    return $set;
  }


  function checkDuplicateMail($email)
  {
    $db = new connect();
    $select = "select count(*) as count from khachhang where email ='$email'";
    $result = $db->getInstance($select);
    return $result;
  }

  function checkDuplicatePhone($sodienthoai)
  {
    $db = new connect();
    $select = "select count(*) as countPhone from khachhang where sodienthoai =$sodienthoai";
    $result = $db->getInstance($select);
    return $result;
  }

  function getIdKhachHang($id)
  {
    $db = new connect();
    $select = "select * from khachhang where makh=$id";
    $results = $db->getInstance($select);
    return $results;
  }

  function updateKhachHang($id, $tenkh, $hinhprofile, $username, $matkhau, $email, $diachi, $sodienthoai)
  {
    $db = new connect();
    $query = "update khachhang set tenkh='$tenkh', hinhprofile='$hinhprofile',username='$username',matkhau='$matkhau',email='$email',diachi='$diachi',sodienthoai='$sodienthoai' where makh=$id";
    $db->getexec($query);
  }

  function updatepassKhachHang($id, $matkhau)
  {
    $db = new connect();
    $query = "update khachhang set matkhau = '$matkhau' where makh= $id";
    $db->getexec($query);
  }

  function resetpassKhachHang($matkhau)
  {
    $db = new connect();
    $query = "update khachhang set matkhau = '$matkhau'";
    $db->getexec($query);
  }
  function getEmailKhachHang($email)
  {
    $db = new connect();
    $select = "select * from khachhang where email = '$email'";
    $result = $db->getInstance($select);
    return $result;
  }

  function changePassword($pass, $email)
  {
    $db = new connect();
    $query = "update khachhang set matkhau = '$pass' where email = '$email' ";
    $db->getexec($query);
  }
}
