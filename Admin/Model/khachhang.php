<?php
class KhachHang
{
    function __construct()
    {
    }
    function getListKhachHang()
    {
        $db = new connect();
        $select = "select * from khachhang";
        $results = $db->getList($select);
        return $results;
    }

    function insertKhachHang($tenkh, $username, $matkhau, $email, $diachi, $sodienthoai, $vaitro)
    {
        $db = new connect();
        $query = "insert into khachhang (makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro,tinhtrang) values (null,'$tenkh','$username','$matkhau','$email','$diachi','$sodienthoai','$vaitro',1)";
        $db->exec($query);
    }

    function updateKhachHang($id, $tenkh, $username, $matkhau, $email, $diachi, $sodienthoai)
    {
        $db = new connect();
        $query = "update khachhang set tenkh='$tenkh',username='$username',matkhau='$matkhau',email='$email',diachi='$diachi',sodienthoai='$sodienthoai' where makh=$id";
        $db->exec($query);
    }

    function getIdKhachHang($id)
    {
        $db = new connect();
        $select = "select * from khachhang where makh=$id";
        $results = $db->getInstance($select);
        return $results;
    }

    function deleteKhachHang($id)
    {
        $db = new connect();
        $query = "delete from khachhang where makh=$id";
        $db->exec($query);
    }
    function fillterKhachhang($vaitro)
    {
        $db = new connect();
        $select = "select * from khachhang where vaitro='$vaitro'";
        $results = $db->getList($select);
        return $results;

        // $db=new connect();
  
        // $select ="select * from khachhang where vaitro like :vaitro";
      
      
        // $stm=$db->getpreapre($select);
      
      
        // $str_name="%".$vaitro."%";
      
        // $stm->bindParam(':tenhh',$str_name);
      
        // $stm->execute();
      
        // return $stm;
    }

    function getSearchKh($name)
    {
        $db = new connect();
        $select = "select * from khachhang where tenkh like '%$name%' or username like '%$name%' or email like '%$name%' or sodienthoai like '%$name%'";
        $results = $db->getList($select);
        return $results;
    }


    function exportKhachhang()
    {
        $db = new connect();
        $select = "select * from khachhang";
        $results = $db->getList($select);
        return $results;
    }

    function getListTrangThai()
    {
        $db = new connect();
        $select = "select * from khachhang where tinhtrang = 1";
        $results = $db->getList($select);
        return $results;
    }

    function checkDuplicateMail($email){
        $db=new connect();
        $select = "select count(*) as count from khachhang where email ='$email'";
        $result=$db->getInstance($select);
        return $result;
      }
    
      function checkDuplicatePhone($sodienthoai){
        $db=new connect();
        $select = "select count(*) as countPhone from khachhang where sodienthoai =$sodienthoai";
        $result=$db->getInstance($select);
        return $result;
      }
      
    
}
