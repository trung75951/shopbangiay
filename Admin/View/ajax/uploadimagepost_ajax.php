<?php
$valid_extensions = array('jpeg', 'jpg', 'png');

if (0 < $_FILES['file']['error']) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {

    $code=mt_rand(10,100000);/* rename the file name*/
    $target_dir = "../../../Content/imagebaiviet/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    // echo $target_file;
    // exit();

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $size = $_FILES['file']['size'];
    $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    if ($size > 2097152) /*2 mb 1024*1024 bytes*/ {
        echo json_encode(array("statusCode" => 400, 'msg' => "Image allowd less than 2 mb"));
    } else if (!in_array($ext, $valid_extensions)) {
        echo json_encode(array("statusCode" => 400, 'msg' => $ext . ' not allowed'));
    } else {

        $result = move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
        echo json_encode(array("statusCode" => 200, 'code' => $target_file));
    }
}
