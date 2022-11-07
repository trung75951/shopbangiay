<?php
class Posts
{
    function __construct()
    {
    }
    function getListallposts()
    {
        $db = new connect();
        $select = "SELECT * FROM posts a INNER JOIN loai b on a.maloai=b.maloai ";
        $results = $db->getList($select);
        return $results;
    }
    function getListallpostsPage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT * FROM posts a INNER JOIN loai b on a.maloai=b.maloai ORDER BY idposts DESC limit " . $start . "," . $limit . " ";
        $results = $db->getList($select);
        return $results;
    }
    function getPostid($id)
    {
        $db = new connect();
        $select = "SELECT * FROM posts a INNER JOIN loai b on a.maloai=b.maloai WHERE a.idposts=$id";
        $results = $db->getInstance($select);
        return $results;
    }

    function insertBinhluan($idpost, $makh, $noidung)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngaybl = $date->format("Y-m-d");
        $query = "insert into binhluan (idbinhluan,idposts,makh,noidung,ngaybinhluan) values(null,$idpost,$makh,'$noidung','$ngaybl')";
        $db->getexec($query);
    }

    function countcomment($id)
    {
        $db = new connect();
        $select="select count(idbinhluan) from binhluan where idposts=$id";
        $results=$db->getInstance($select);
        return $results[0];
    }
    function getListAllBinhluan($idposts){
        $db=new connect();
        $select = "select a.tenkh,b.noidung, a.hinhprofile,b.ngaybinhluan from khachhang a inner join binhluan b on a.makh=b.makh where b.idposts=$idposts order by b.idbinhluan desc";
        $results=$db->getList($select);
        return $results;
    }
}
