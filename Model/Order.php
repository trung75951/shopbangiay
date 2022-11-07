<?php
class Order
{
    public function __construct()
    {
    }

    public function insertOrder($makh)
    {
        $date = new DateTime('now');
        $ngay = $date->format("Y-m-d");
        $db = new connect();
        $query = "insert into hoadon(idhoadon,makh,ngaydat,tongtien) values(null, $makh,'$ngay',0)";
        $db->getexec($query);
        $select = "select idhoadon from hoadon order by idhoadon desc limit 1";
        $result = $db->getInstance($select);
        return $result[0];
    }

    public function updateOrderTongTien($idhoadon, $tongtien)
    {
        $db = new connect();
        $query = "update hoadon set tongtien=$tongtien where idhoadon=$idhoadon";
        $db->getexec($query);
    }

    public function insertOrderDetail($idhoadon, $mahh, $soluong, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon(idhoadon,mahh,soluong,thanhtien,size) values($idhoadon,$mahh,$soluong,$thanhtien,0)";
        $db->getexec($query);
    }

    public function getOrder($idhoadon)
    {
        $db = new connect();
        $select = "select b.idhoadon, b.makh, a.tenkh, a.diachi, a.sodienthoai, b.ngaydat from khachhang a inner join hoadon b on a.makh=b.makh where idhoadon=$idhoadon";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getOrderDetail($idhoadon)
    {
        $db = new connect();
        $select = "select a.tenhh, a.dongia, b.soluong, b.thanhtien from hanghoa a inner join cthoadon b on a.mahh=b.mahh where idhoadon=$idhoadon";
        $result = $db->getList($select);
        return $result;
    }

    public function decreaSoluongTon($soluong,$mahh){
        $db=new connect();
        $query="update hanghoa set soluongton = soluongton - $soluong where mahh=$mahh";
        $db->getexec($query);
    }

}
