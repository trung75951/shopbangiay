<?php
class HangHoa
{
  var $mahh = null;
  var $tenhh = null;
  var $dongia = 0;
  var $giamgia = 0;
  var $hinh = "imagegiay/";
  var $maloai = null;
  var $dacbiet = 0;
  var $soluotxem = 0;
  var $ngaylap = null;
  var $mota = null;
  var $soluonton = 0;
  var $mausac = null;
  var $size = 0;
  function __construct()
  {
  }

  function getListHangHoaByTypes($arrType){
    $db = new connect();
    $select = "SELECT * FROM `hanghoa` WHERE `maloai` = $arrType[0]";
    $length = count($arrType);
    for ($i = 1; $i < $length; $i++) {
      if ($arrType[$i] == 5) {

        $select = "SELECT * FROM `hanghoa`";
        break;
      } elseif ($arrType[$i] != 5) {
        $select .= " or `maloai` = $arrType[$i]";
      }
    }
    // echo $select;
    // exit();

    $result = $db->getList($select);
    return $result;
  }

  function getfilterprice($giakhoidiem,$giaketthuc){
    $db = new connect();
    $select ="select * from hanghoa where dongia > '$giakhoidiem' and dongia < '$giaketthuc'";
    $result = $db->getList($select);
    return $result;
  }

  function getListHangHoaView(){
    $db=new connect();
    $select = "select * from hanghoa group by soluotxem desc";
    $result = $db->getList($select);
    return $result;
  }

  function getListHangHoaIncrea(){
    $db=new connect();
    $select = "select * from hanghoa order by dongia asc";
    $result = $db->getList($select);
    return $result;
  }

  function getListHangHoaDecrea(){
    $db=new connect();
    $select = "select * from hanghoa order by dongia desc";
    $result = $db->getList($select);
    return $result;
  }

  function getFilterMaloai1($arrmaloai){
    $db = new connect();
    if ($arrmaloai!="") {
      $select = "select * from hanghoa where maloai != ''";
      $maloai = implode("','", $arrmaloai);
      if ($maloai!="") {
        $select .= "and maloai in('" . $maloai . "')";
      }
      elseif($maloai==""){
        $select = "select * from hanghoa where maloai != ''";
      }
    }
    // elseif($arrmaloai==""){
    //   $select = "select * from hanghoa where maloai != ''";
    // }
    
    // echo $select;
    // exit();
    $result = $db->getList($select);
    return $result;
  }
  function getFilterMaloai()
  {
    $db = new connect();
    $select = "select * from hanghoa where maloai != ''";
    if (isset($_POST['maloai'])) {
      $maloai = implode("','", $_POST['maloai']);
      if (isset($maloai)) {
        $select .= "and maloai in('" . $maloai . "')";
      }
    }
    $result = $db->getList($select);
    return $result;
  }

  function getListHangHoaNew()
  {
    $db = new connect();
    $select = "SELECT * FROM hanghoa ORDER by mahh DESC limit 8 ";
    $result = $db->getList($select);
    return $result;
  }
  function getListSale()
  {
    $db = new connect();
    $select = "select * from hanghoa WHERE giamgia >0 ORDER by mahh limit 8  ";
    $result = $db->getList($select);
    return $result;
  }
  function getListHangHoa()
  {
    $db = new connect();
    $select = "select * from hanghoa where giamgia=0";
    $result = $db->getList($select);
    return $result;
  }
  function getListHangHoaSaleAll()
  {
    $db = new connect();
    $select = "select * from hanghoa where giamgia>0";
    $result = $db->getList($select);
    return $result;
  }

  function getDetail($id)
  {
    $db = new connect();
    $select = "select * from hanghoa where mahh=$id";
    $result = $db->getInstance($select);
    return $result;
  }

  function getListHangHoaPage($start, $limit)
  {
    $db = new connect();
    $select = "select * from hanghoa where giamgia=0 limit " . $start . "," . $limit . "";
    $result = $db->getList($select);
    return $result;
  }



  function updateView($id)
  {
    $db = new connect();
    $query = "update hanghoa set soluotxem=soluotxem+1 where mahh=$id";
    $db->getexec($query);
  }

  function getSearch($name)
  {

    $db = new connect();

    $select = "select * from hanghoa where tenhh like :tenhh";


    $stm = $db->getpreapre($select);


    $str_name = "%" . $name . "%";

    $stm->bindParam(':tenhh', $str_name);

    $stm->execute();

    return $stm;
  }

  public function getListMaLoaiSP()
  {
    $db = new connect();
    $select = "select maloai,tenloai from loai";
    $result = $db->getList($select);
    return $result;
  }

  public function getsanphammaloai($id)
  {
    $db = new connect();
    $select = "select maloai from hanghoa where mahh =$id"; 
    $result = $db->getInstance($select);
    return $result;
  }
}
