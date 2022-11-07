$(document).ready(function() {
    $('#tenhh').on('input', function() {
        checktenhh();
    });
    $('#dongia').on('input', function() {
        checkdongia();
    });

    $('#giamgia').on('input', function() {
        checkgiamgia();
    });
    $('#mota').on('input', function() {
        checkmota();
    });
    $('#soluongton').on('input', function() {
        checksoluongton();
    });
    $('#mausac').on('input', function() {
        checkmausac();
    });
    $('#size').on('input', function() {
        checksize();
    });

    $('#submit').click(function() {
        if (!checktenhh() && !checkdongia() && !checkmota() && !checksoluongton() && !checkmausac() && !checksize()) {
            console.log("er1");
            $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
        } else if (!checktenhh() || !checkdongia() || !checkmota() || !checksoluongton() || !checkmausac() || !checksize()) {
            $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
            console.log("er");
        } else {
            console.log("ok");
            $("#message").html("");
            var form = $('#myform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "index.php?action=sanpham&act=insert_action",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function() {
                    $('#submit').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                    $('#submit').attr("disabled", true);
                    $('#submit').css({
                        "border-radius": "50%"
                    });
                },

                success: function(data) {
                    $('#message').html(data);
                },
                complete: function() {
                    setTimeout(function() {
                        $('#myform').trigger("reset");
                        $('#submit').html('Submit');
                        $('#submit').attr("disabled", false);
                        $('#submit').css({
                            "border-radius": "4px"
                        });
                    }, 200);
                }
            });
        }
    });
    $('#submitUP').click(function() {
        if (!checktenhh() && !checkdongia() && !checkmota() && !checksoluongton() && !checkmausac() && !checksize()) {
            console.log("er1");
            $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
        } else if (!checktenhh() || !checkdongia() || !checkmota() || !checksoluongton() || !checkmausac() || !checksize()) {
            $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
            console.log("er");
        } else {
            console.log("ok");
            $("#message").html("");
            var form = $('#myform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "index.php?action=sanpham&act=update_action",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function() {
                    $('#submitUP').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                    $('#submitUP').attr("disabled", true);
                    $('#submitUP').css({
                        "border-radius": "50%"
                    });
                },

                success: function(data) {
                    $('#message').html(data);
                },
                complete: function() {
                    setTimeout(function() {
                        $('#myform').trigger("reset");
                        $('#submitUP').html('submitUP');
                        $('#subsubmitUPmit').attr("disabled", false);
                        $('#submitUP').css({
                            "border-radius": "4px"
                        });
                    }, 200);
                }
            });
        }
    });
});

// =================================================

function checktenhh() {
    var pattern = /^[A-Za-z0-9]+$/;
    var name = $('#tenhh').val();
    var validname = pattern.test(name);
    if (name == "") {
        $('#tenhh_err').html('Tên hàng hóa không được bỏ trống');
        console.log(name)
        return false;
    } else if (name.length < 2) {
        $('#tenhh_err').html('Tên hàng hóa quá ngắn');
        return false;
    } else {
        $('#tenhh_err').html('');
        return true;
    }
}

function checkdongia() {
    if (!$.isNumeric($("#dongia").val())) {
        $("#dongia_err").html("Chỉ được nhập số");
        return false;
    } else if ($("#mobile").val() == "") {
        $("#dongia_err").html("Không được để trống");
        return false;
    } else {
        $("#dongia_err").html("");
        return true;
    }
}

function checkgiamgia() {
    if (!$.isNumeric($("#giamgia").val())) {
        $("#giamgia_err").html("Chỉ được nhập số");
        return false;
    } else {
        $("#giamgia_err").html("");
        return true;
    }
}

function checkmota() {
    var pattern = /^[A-Za-z0-9]+$/;
    var mota = $('#mota').val();
    var validmota = pattern.test(mota);
    if (mota.length < 4) {
        console.log(mota)
        $('#mota_err').html('Tên hàng hóa quá ngắn');
        return false;
    } else if (mota == "") {
        $('#mota_err').html('Bắt buộc nhập');
        return false;
    } else {
        $('#mota_err').html('');
        return true;
    }
}


function checksoluongton() {
    if ($("#soluongton").val() == "") {
        $("#soluongton_err").html("Không được để trống");
        return false;
    } else if (!$.isNumeric($("#soluongton").val())) {
        $("#soluongton_err").html("Chỉ được nhập số");
        return false;
    } else {
        $("#soluongton_err").html("");
        return true;
    }
}

function checkmausac() {
    var mausac = $('#mausac').val();
    if (mausac == "") {
        $('#mausac_err').html('Bắt buộc nhập');
        return false;
    } else if (mausac.length < 4) {
        $('#mausac_err').html('không được nhập dưới 4 ký tự');
        return false;
    } else {
        $('#mausac_err').html('');
        return true;
    }
}

function checksize() {
    if ($("#size").val() == "") {
        $("#size_err").html("Không được để trống");
        return false;
    } else if ($("#size").val().length > 2) {
        $('#size_err').html('Size không đươc nhập hơn đơn vị 100');
        return false;
    } else if (!$.isNumeric($("#size").val())) {
        $("#size_err").html("Chỉ được nhập số");
        return false;
    } else {
        $("#size_err").html("");
        return true;
    }
}



// ============================================================