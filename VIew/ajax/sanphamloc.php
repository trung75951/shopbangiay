<?php
include "../../Model/connect.php";
include '../../Model/hanghoa.php';
$giakhoidiem = $_POST['giakhoidiem'];
$giaketthuc = $_POST['giaketthuc'];


$hh = new HangHoa();
$results = $hh->getfilterprice($giakhoidiem, $giaketthuc);

while ($set = $results->fetch()) : ?>
    <div class="col-lg-3  mb-3 text-left">
        <div class="card" style="width: 85%;">
            <img class="card-img-top" src="<?php echo 'Content/imagegiay/' . $set['hinhthumbnail']; ?>" alt="">
            <div class="card-body">
                <h5 class="card-title"><?php echo $set['tenhh']; ?></h5>
                <?php

                if ($set['giamgia'] == 0) {
                    echo '<h6 class="font-weight-bold">
                            <font color="red">' . number_format($set['dongia']) . '<sup><u>VNĐ</u></sup></font></h6>';
                } else if ($set['giamgia'] != 0) {
                    echo '<h6 class="font-weight-bold">
                                                                            <font color="red">' . number_format($set['dongia']) . '<sup><u>VNĐ</u></sup></font>
                                                                            <strike>' . number_format($set['giamgia']) . 'VNĐ</strike><sup><u>đ</u></sup>
                                                                        </h6>';
                }
                ?>
                <h5>Số lượt xem: <?php echo $set['soluotxem']; ?></h5>
                <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh']; ?>">
                    <button class="mt-2 btn btn-primary" style="width: 70px; border: none; border-radius: 15px;" type="button">Xem</button>
                </a>
            </div>
        </div>
    </div>

<?php
endwhile;

?>