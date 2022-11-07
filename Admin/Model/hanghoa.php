<?php

class HangHoa
{
    public function __construct()
    {
    }

    public function getListHangHoa()
    {
        $db = new connect();
        $select = 'select * from hanghoa  order by mahh desc';
        $result = $db->getList($select);
        return $result;
    }
    public function getHangHoaId($id)
    {
        $db = new connect();
        $select = "select * from hanghoa where mahh=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getListMaLoaiSP()
    {
        $db = new connect();
        $select = "select maloai,tenloai from loai";
        $result = $db->getList($select);
        return $result;
    }
    public function insertsp($tehh, $dongia, $giamgia, $hinhthumbnail, $hinhdetail, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size)
    {
        $db = new connect();
        $query = "insert into hanghoa(mahh, tenhh, dongia, giamgia,hinhthumbnail,hinhdetail, Nhom, maloai, dacbiet, soluotxem, ngaylap, mota, soluongton, mausac, size) values (null, '$tehh','$dongia','$giamgia','$hinhthumbnail','$hinhdetail','$Nhom','$maloai','$dacbiet','$soluotxem','$ngaylap','$mota','$soluongton','$mausac','$size')";
        $db->exec($query);
    }


    function updateSanpham($id, $tenhh, $dongia, $giamgia, $hinhthumbnail, $hinhdetail, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size)
    {
        $db = new connect();
        $query = "update hanghoa set tenhh='$tenhh',dongia='$dongia',giamgia='$giamgia',hinhthumbnail='$hinhthumbnail',hinhdetail='$hinhdetail',Nhom='$Nhom',maloai='$maloai',dacbiet='$dacbiet',soluotxem='$soluotxem',ngaylap='$ngaylap',mota='$mota',soluongton='$soluongton', mausac='$mausac',size='$size'  where mahh=$id";
        $db->exec($query);
    }

    function deleteMaHang($id)
    {
        $db = new connect();
        $query = "delete from hanghoa where mahh=$id";
        $db->exec($query);
    }

    function filtersanphamMaLoai($maloai)
    {
        $db = new connect();
        $select = "select * from hanghoa a inner join loai b on a.maloai=b.maloai where a.maloai=$maloai";
        // $select="SELECT * FROM hanghoa a INNER JOIN loai b on a.maloai=b.maloai WHERE a.maloai=$maloai";
        $results = $db->getList($select);
        return $results;
    }
}
