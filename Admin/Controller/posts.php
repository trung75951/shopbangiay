<?php
$action = 'posts';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'posts':
        include 'View/posts.php';
        break;
    case 'insertPost':
        include 'View/editposts.php';
        break;
    case 'insert_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieude = $_POST['tieude'];
            $noidung = $_POST['noidung'];
            $mota = $_POST['mota'];
            $ngayviet = $_POST['ngayviet'];
            $author = $_POST['author'];
            $tag = $_POST['tagbaiviet'];

            // $maloai = $_POST['maloai'];
            $hinh = $_FILES['image']['name'];
            $posts = new Posts();
            $posts->insertPost($tieude, $noidung, $mota, $ngayviet, $author,$tag, $hinh);

            uploadImageBlog();
            echo "<script>alert('Thêm bài viết thành công')</script>";
        }
        // include 'View/posts.php';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=posts"/>';

        break;
    case 'update':
        include 'View/editposts.php';
        break;
    case 'update_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo "hellow";
            //     exit();
            $id = $_POST['idposts'];
            $tieude = $_POST['tieude'];
            $noidung = $_POST['noidung'];
            $mota = $_POST['mota'];
            $ngayviet = $_POST['ngayviet'];
            $author = $_POST['author'];
            $tag = $_POST['tagbaiviet'];
            
            // $maloai = $_POST['maloai'];
            // $hinh = $_FILES['image']['name'];
            $flag = false;
            if (isset($_FILES['image']['name'])) {
                $hinh = $_FILES['image']['name'];
                $flag = true;
                // echo "1";
            }
            else{
                $hinh = $_POST['thumbnailexit'];
                // echo "2";
                // exit();
            }
            // $hinh = $_POST['hinhthumbnailPost'];
            $posts = new Posts();
            $checkid = $posts->getPostId($id);

            // echo $hinh;
            // exit();
            $posts->updatePosts1($checkid['idposts'], $tieude, $noidung, $mota,$tag,$hinh, $ngayviet, $author);
            if ($flag==true) {
                uploadimage_ajax('../Content/imagebaiviet/');
            }
            echo "<script>alert('Update bài viết thành công')</script>";
            // if (!isset($hinh)) {
            //     $posts->updatePosts1($checkid['idposts'], $tieude, $noidung, $mota, $ngayviet, $author, $maloai);
            //     echo "<script>alert('Update bài viết thành công')</script>";
            // }
            // else{
            //     $posts->updatePosts($checkid['idposts'], $tieude, $noidung, $mota, $ngayviet, $author, $maloai, $hinh);
            //     if ($hinh==true) {
            //         uploadImageBlog();
            //     }
            //     echo "<script>alert('Update bài viết thành công')</script>";
            // }

        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=posts"/>';

        include 'View/posts.php';
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $posts = new Posts();
            $posts->deletePost($id);
            echo "<script>alert('Xóa bài viết thành công')</script>";
        }
        include 'View/posts.php';
        break;
}
