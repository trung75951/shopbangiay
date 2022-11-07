<?php
    class Voucher{
        public function getVoucher($voucherName){
            $db=new connect();
            $select="select COUNT(voucher_id) as count, voucher_spilit from voucher where voucher_name = '$voucherName'";
            $result=$db->getInstance($select);
            if ($result['count'] == 0) {
                $magiamgiaerr = "err";
                return $magiamgiaerr;
                // echo $magiamgiaerr ;
                // exit();
            }
            else{
                return $result[1];

            }
        }
        public function updatevoucherSL($voucherName){
            $db = new connect();
            $query="update voucher set voucher_soluong = voucher_soluong-1 where voucher_name = '$voucherName'";
            $db->getexec($query);
        }
        public function getVoucherSL($voucherName){
            $db=new connect();
            $select="select voucher_soluong from voucher where voucher_name='$voucherName'";
            $result = $db->getInstance($select);
            return $result[0];
        }


    }
?>