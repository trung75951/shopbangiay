<?php
// include "Model/connect.php";
// include "Model/hanghoa.php";
// include "Model/loaisanpham.php";
session_start();
// unset($_SESSION['admin']);

include "Model/uploadhinh.php";
// include "Model/recycle.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Trang thống kê admin</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="../Content/css/simple-datatables.css">
    <link href="Content/css/style.css" rel="stylesheet" />
    <!-- <script src="https://cdn.tiny.cloud/1/5to837jgaayhbjkam58rzcyye5p6nut0nzdktthsp7bpuj5q/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Content/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../Content/css/metro-all.min.css"> -->
    <link rel="stylesheet" href="../Content/css/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="../bootstrap-tagsinput-main/bootstrap-tagsinput-main/src/bootstrap-tagsinput.css">

    <script src="../Content/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../Content/css/font-awesome_ajax.min.css" />



</head>

<body class="sb-nav-fixed">
    <?php
    if (isset($_SESSION['useradmin'])) {
        include 'View/navbar.php';
    }
    ?>
    <div id="layoutSidenav">
        <?php
        if (isset($_SESSION['useradmin'])) {
            include "View/layoutslidenav.php";
        }
        ?>
        <div id="layoutSidenav_content">
            <main>
                <?php
                if (isset($_SESSION['useradmin'])) {
                    echo '<div class="container-fluid px-4">';
                }
                ?>
                <!-- <div class="container-fluid px-4"> -->
                <?php
                if (isset($_SESSION['useradmin'])) {
                    echo '<div class="card mb-4">';
                }
                ?>
                <!-- <div class="card mb-4"> -->
                <div class="card-body">
                    <?php
                    $ctrl = "sanpham";
                    if (isset($_GET['action']))
                        $ctrl = $_GET['action'];
                    include 'Controller/' . $ctrl . '.php';
                    ?>
                </div>
        </div>
    </div>
    </main>
    <?php
    if (isset($_SESSION['useradmin'])) {
        include "View/footer.php";
    }
    ?>
    </div>
    </div>

    <script src="../Content/js/bundle.min.js" crossorigin="anonymous"></script>
    <script src="Content/js/scripts.js"></script>
    <!-- <script src="../Content/js/metro.min.js"></script> -->
    <script src="../Content/js/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../Content/css/fontawesome.js"></script>
    <script src="../Content/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- <script src="../Content/js/jquery.tagsinput.min.js"></script> -->
    <script src="../bootstrap-tagsinput-main/bootstrap-tagsinput-main/src/bootstrap-tagsinput.js"></script>
    <script src="../Content/css/ajaxjquery.js"></script>
    <script>
        $(document).ready(function() {

            $('#tenkh').on('input', function() {
                checktenkh();
            });
            $('#username').on('input', function() {
                checkusername();
            });
            $('#email').on('input', function() {
                checkemail();
            });
            $('#diachi').on('input', function() {
                checkdiachi();
            });
            $('#sodienthoai').on('input', function() {
                checkphone();
            });
            // ================================================
            $('#fisrtname').on('input', function() {
                checkfisrtname();
            });
            $('#lastname').on('input', function() {
                checklastname();
            });
            // =================================================


            $('#submitInsertkh').click(function() {
                if (!checktenkh() && !checkusername() && !checkemail() && !checkdiachi() && !checkphone()) {
                    console.log("er1");
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
                } else if (!checktenkh() || !checkusername() || !checkemail() || !checkdiachi() || !checkphone()) {
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
                    console.log("er");
                } else {
                    console.log("ok");
                    $("#message").html("");
                    var form = $('#myform')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type: "POST",
                        url: "index.php?action=khachhang&act=insertkh_action",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        beforeSend: function() {
                            $('#submitInsertkh').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                            $('#submitInsertkh').attr("disabled", true);
                            $('#submitInsertkh').css({
                                "border-radius": "50%"
                            });
                        },

                        success: function(data) {
                            $('#message').html(data);
                        },
                        complete: function() {
                            setTimeout(function() {
                                $('#myform').trigger("reset");
                                $('#submitInsertkh').html('submit');
                                $('#submitInsertkh').attr("disabled", false);
                                $('#submitInsertkh').css({
                                    "border-radius": "4px"
                                });
                            }, 200);
                        }
                    });
                }
            });
            $('#submitUpdateKh').click(function() {
                if (!checktenkh() && !checkusername() && !checkemail() && !checkdiachi() && !checkphone()) {
                    console.log("er1");
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
                } else if (!checktenkh() || !checkusername() || !checkemail() || !checkdiachi() || !checkphone()) {
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
                    console.log("er");
                } else {
                    console.log("ok");
                    $("#message").html("");
                    var form = $('#myform')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type: "POST",
                        url: "index.php?action=khachhang&act=update_action",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        beforeSend: function() {
                            $('#submitUpdateKh').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                            $('#submitUpdateKh').attr("disabled", true);
                            $('#submitUpdateKh').css({
                                "border-radius": "50%"
                            });
                        },

                        success: function(data) {
                            $('#message').html(data);
                        },
                        complete: function() {
                            setTimeout(function() {
                                $('#myform').trigger("reset");
                                $('#submitUpdateKh').html('submit');
                                $('#submitUpdateKh').attr("disabled", false);
                                $('#submitUpdateKh').css({
                                    "border-radius": "4px"
                                });
                            }, 200);
                        }
                    });
                }
            });
            // =================================================

            $('#submitInsertUser').click(function() {
                if (!checkfisrtname() && !checklastname() && !checkemail() && !checkdiachi() && !checkphone() && !checkusername()) {
                    console.log("er1");
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
                } else if (!checklastname() || !checkusername() || !checkemail() || !checkdiachi() || !checkphone() || !checkfisrtname()) {
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
                    console.log("er");
                } else {
                    console.log("ok");
                    $("#message").html("");
                    var form = $('#myform')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type: "POST",
                        url: "index.php?action=user&act=insert_action",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        beforeSend: function() {
                            $('#submitInsertUser').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                            $('#submitInsertUser').attr("disabled", true);
                            $('#submitInsertUser').css({
                                "border-radius": "50%"
                            });
                        },

                        success: function(data) {
                            $('#message').html(data);
                        },
                        complete: function() {
                            setTimeout(function() {
                                $('#myform').trigger("reset");
                                $('#submitInsertUser').html('submit');
                                $('#submitInsertUser').attr("disabled", false);
                                $('#submitInsertUser').css({
                                    "border-radius": "4px"
                                });
                            }, 200);
                        }
                    });
                }
            });
            $('#submitUpdateUser').click(function() {
                if (!checkfisrtname() && !checklastname() && !checkemail() && !checkdiachi() && !checkphone() && !checkusername()) {
                    console.log("er1");
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
                } else if (!checklastname() || !checkusername() || !checkemail() || !checkdiachi() || !checkphone() || !checkfisrtname()) {
                    $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
                    console.log("er");
                } else {
                    console.log("ok");
                    $("#message").html("");
                    var form = $('#myform')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type: "POST",
                        url: "index.php?action=user&act=update_action",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        beforeSend: function() {
                            $('#submitUpdateUser').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                            $('#submitUpdateUser').attr("disabled", true);
                            $('#submitUpdateUser').css({
                                "border-radius": "50%"
                            });
                        },

                        success: function(data) {
                            $('#message').html(data);
                        },
                        complete: function() {
                            setTimeout(function() {
                                $('#myform').trigger("reset");
                                $('#submitUpdateUser').html('submit');
                                $('#submitUpdateUser').attr("disabled", false);
                                $('#submitUpdateUser').css({
                                    "border-radius": "4px"
                                });
                            }, 200);
                        }
                    });
                }
            });

            $('#submitimg').click(function() {
                // console.log('sadasdasdasd')

                var form_data = new FormData();
                var arrImg = [];
                var totalfiles = document.getElementById('files').files.length;

                for (let i = 0; i < totalfiles; i++) {
                    const element = files.files[i].name;
                    arrImg.push(files.files[i].name)
                }
                console.log(arrImg);
                if (arrImg.lenth != 0) {
                    var strNameImg = arrImg.join(';');
                    $('#hinhdetailexit').val(strNameImg);

                }
                /* Read selected files */
                for (var index = 0; index < totalfiles; index++) {
                    form_data.append("files[]", document.getElementById('files').files[index]);
                }

                /* AJAX request */
                $.ajax({
                    url: './View/ajax/ajaxfile.php',
                    type: 'post',
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        for (var index = 0; index < response.length; index++) {
                            var src = response[index];

                            /* Add img element in <div id='preview'> */
                            $('#preview').append('<img src="' + src + '" width="200px;" height="200px">');
                        }

                    }
                });

            });
        });

        // =================================================



        function checktenkh() {
            if ($('#tenkh').val() == "") {
                $('#tenkh_err').html('Tên khách hàng không được để trống');
                return false;
            } else if ($('#tenkh').val().length < 4) {
                $('#tenkh_err').html('Tên không được quá ngắn');
                return false;
            } else {
                $('#tenkh_err').html('');
                return true;
            }
        }

        function checkusername() {
            var pattern = /^[A-Za-z0-9]+$/;
            var user = $('#username').val();
            var validuser = pattern.test(user);
            if (user == "") {
                $('#username_err').html('username không được để trống');
                return false;
            } else if ($('#username').val().length < 4) {
                $('#username_err').html('username không được quá ngắn');
                return false;
            } else if (!validuser) {
                $('#username_err').html('username không được gõ dấu');
                return false;
            } else {
                $('#username_err').html('');
                return true;
            }
        }

        function checkemail() {
            var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $('#email').val();
            var validemail = pattern1.test(email);
            if (email == "") {
                $('#email_err').html('Không được bỏ trống email');
                return false;
            } else if (!validemail) {
                $('#email_err').html('Email không hợp lệ');
                return false;
            } else {
                $('#email_err').html('');
                return true;
            }
        }

        function checkdiachi() {
            if ($('#diachi').val() == "") {
                $('#diachi_err').html('Tên địa chỉ không được để trống');
                return false;
            } else if ($('#diachi').val().length < 4) {
                $('#diachi_err').html('Tên không được quá ngắn');
                return false;
            } else {
                $('#diachi_err').html('');
                return true;
            }
        }

        function checkphone() {
            if ($("#sodienthoai").val() == "") {
                $("#sodienthoai_err").html("Số điện thoại không được để trống");
                return false;
            }
            if (!$.isNumeric($("#sodienthoai").val())) {
                $("#sodienthoai_err").html("chỉ được nhập số");
                return false;
            } else if ($("#sodienthoai").val().length != 10) {
                $("#sodienthoai_err").html("Yêu cầu nhập 10 số");
                return false;
            } else {
                $("#sodienthoai_err").html("");
                return true;
            }
        }
        // ============================================================
        function checkfisrtname() {
            if ($('#fisrtname').val() == "") {
                $('#fisrtname_err').html('Tên không được để trống');
                return false;
            } else if ($('#fisrtname').val().length < 4) {
                $('#fisrtname_err').html('Tên không được quá ngắn hơn 4 ký tự');
                return false;
            } else {
                $('#fisrtname_err').html('');
                return true;
            }
        }

        function checklastname() {
            if ($('#lastname').val() == "") {
                $('#lastname_err').html('Tên họ không được để trống');
                return false;
            } else if ($('#lastname').val().length < 4) {
                $('#lastname_err').html('Tên họ không được quá ngắn hơn 4 ký tự');
                return false;
            } else {
                $('#lastname_err').html('');
                return true;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // tinymce.init({
            //     selector: 'textarea',
            //     plugins: [
            //         'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
            //         'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
            //         'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
            //     ],
            //     toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'

            // });

            tinymce.init({
                selector: 'textarea',
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste imagetools wordcount'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });

        })
    </script>
</body>

</html>