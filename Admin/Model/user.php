<?php
class User
{
    
    function __construct()
    {
        
    }

    function getListUser(){
        $db=new connect();
        $select="select * from user where vaitro = 'user'";
        $results=$db->getList($select);
        return $results;

    }
    function login_admin($username, $pwlogin,$sodienthoai)
    {
        $db = new connect();
        $select = "select * from user where (username='$username' and matkhau='$pwlogin') or (sodienthoai='$sodienthoai' and matkhau='$pwlogin') ";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }
    function insertUser($fisrtname,$lastname,$email,$username,$street,$ngaysinh,$matkhau,$vaitro,$hinh,$sodienthoai){
        $db=new connect();
        $query="insert into user(id_user ,fisrt_name,last_name,email,username,hinh,street,ngaysinh,matkhau,vaitro,sodienthoai) values(null,'$fisrtname','$lastname','$email','$username','$hinh','$street','$ngaysinh','$matkhau','$vaitro','$sodienthoai')";
        $db->exec($query);
    }

    function updateUser($id,$fisrtname,$lastname,$email,$username,$street,$ngaysinh,$matkhau,$vaitro,$hinh,$sodienthoai){
        $db=new connect();
        $query="update user set fisrt_name='$fisrtname',last_name='$lastname',email='$email',username='$username',hinh='$hinh',street='$street',ngaysinh='$ngaysinh',matkhau='$matkhau',vaitro='$vaitro',sodienthoai='$sodienthoai' where id_user=$id";
        $db->exec($query);
    }

    function getUserID($id){
        $db=new connect();
        $select="select * from user where id_user=$id";
        $result = $db->getInstance($select);
        return $result;
    }

    function deleteUser($id){
        $db=new connect();
        $query="delete from user where id_user=$id";
        $db->exec($query);
    }

    function checkDuplicateMailUs($email){
        $db=new connect();
        $select = "select count(*) as count from user where email ='$email'";
        $result=$db->getInstance($select);
        return $result;
      }
    
      function checkDuplicatePhoneUs($sodienthoai){
        $db=new connect();
        $select = "select count(*) as countPhone from user where sodienthoai =$sodienthoai";
        $result=$db->getInstance($select);
        return $result;
      }
      
}
