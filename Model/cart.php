<?php
function add_itemcart($mahh, $soluong)
{
    $hh = new HangHoa();
    $result = $hh->getDetail($mahh);
    $dongia = $result['dongia'];
    $tenhh = $result['tenhh'];
    $hinh = $result['hinhthumbnail'];
    $soluongton = $result['soluongton'];

    $tong = $dongia * $soluong;
    $item = array(
        'mahh' => $mahh,
        'tenhh' => $tenhh,
        'hinhthumbnail' => $hinh,
        'dongia' => $dongia,
        'soluong' => $soluong,
        'soluongton'=>$soluongton,
        'tong' => $tong
    );

    $_SESSION['cart'][$mahh] = $item;
}



function update_itemCart($mahh, $quantity)
{
    if ($quantity <= 0) {
        unset($_SESSION['cart'][$mahh]);
    } else {
        $_SESSION['cart'][$mahh]['soluong'] = $quantity;
        $totalnew = $_SESSION['cart'][$mahh]['soluong'] * $_SESSION['cart'][$mahh]['dongia'];
        $_SESSION['cart'][$mahh]['tong'] = $totalnew;
    }
}



function subtotal_cart($spilit=0){
    // echo $spilit;
    $subtoltal=0;
    foreach ($_SESSION['cart'] as $items) {
        $subtoltal+=$items['tong'];
    }
    $subtoltal=$subtoltal-$subtoltal*$spilit;
    return $subtoltal;
}



?>
