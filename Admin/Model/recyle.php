<?php
class Recyle
{
    public function __construct()
    {
    }

    function UpdateTrangthaiHide($id)
    {
        $db = new connect();
        $query = "update khachhang set tinhtrang=0 where makh=$id";
        $db->exec($query);
    }

    function getListTrangThaiHide()
    {
        $db = new connect();
        $select = "select * from khachhang where tinhtrang = 0";
        $results = $db->getList($select);
        return $results;
    }

    function updateTrangthaiDisplay($id)
    {
        $db = new connect();
        $query = "update khachhang set tinhtrang = 1 where makh=$id";
        $db->exec($query);
    }
    function getListTrangThai()
    {
        $db = new connect();
        $select = "select * from khachhang where tinhtrang = 1";
        $results = $db->getList($select);
        return $results;
    }

    function deleteVinhvien($id){
        $db=new connect();
        $query="delete from khachhang where makh=$id";
        $db->exec($query);
    }
    // function deletehoadon($id){
    //     $db = new connect();
    //     $query="delete from hoadon where makh=$id";
    //     $db->exec($query);
    // }
}
