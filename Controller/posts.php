<?php
$action = 'posts';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'posts':
        include 'View/posts.php';
        break;
    case 'blog':
        include 'View/blog.php';
        break;
    case 'comment':
        if (!isset($_SESSION['makh'])) {
            echo '<script>alert("Không đăng nhập lấy gì mà bình luận")</script>';
            include "View/blog.php";
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $idposts = $_POST['mabaiviet'];
                $noidung = $_POST['noidungbaiviet'];
                $makh = $_SESSION['makh'];
                $posts = new Posts();
                $posts->insertBinhluan($idposts, $makh, $noidung);
                echo '<script>alert("Thêm bình luận thành công")</script>';
                include 'View/blog.php';
            }
        }
        break;
}
