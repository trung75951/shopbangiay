<?php
class Posts
{
    function __construct()
    {
    }
    function getListallposts(){
        $db=new connect();
        $select="SELECT * FROM posts";
        $results=$db->getList($select);
        return $results;
    }

    function getPostId($id){
        $db=new connect();
        $select="SELECT * FROM posts WHERE idposts=$id";
        $results=$db->getInstance($select);
        return $results;
    }

    function insertPost($tieude,$noidung,$mota,$ngayviet,$author,$tag,$hinh){
        $db=new connect();
        $query="INSERT INTO `posts`(`articletitle`, `articleauthor`, `content`, `mota`, `thumbnail`, `tag`, `ngayviet`) VALUES ('$tieude','$author','$noidung','$mota','$hinh','$tag','$ngayviet')";
        $db->exec($query);

    }

    function updatePosts($id,$tieude,$noidung,$mota,$ngayviet,$author,$maloai,$hinh){
        $db=new connect();
        $query="update posts set articletitle='$tieude',articleauthor='$author',content='$noidung',mota='$mota',thumbnail='$hinh',maloai='$maloai',ngayviet='$ngayviet' where idposts=$id";
        $db->exec($query);
    }

    function updatePosts1($id,$tieude,$noidung,$mota,$tag,$hinh,$ngayviet,$author){
        $db=new connect();
        $query="update posts set articletitle='$tieude',articleauthor='$author',content='$noidung',mota='$mota',tag='$tag',thumbnail='$hinh',ngayviet='$ngayviet' where idposts=$id";
        $db->exec($query);
    }

    function deletePost($id){
        $db=new connect();
        $query="delete from posts where idposts=$id";
        $db->exec($query);
    }
}
