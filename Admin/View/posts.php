<div class="col-md-4 col-md-offset-4">
    <h3><b>DANH SÁCH CÁC BÀI VIẾT</b></h3>
</div>
<div class="row col-12">
    <a class="col-lg-2" style="width: 13%;" href="index.php?action=posts&act=insertPost">
        <button class="btn btn-success">Thêm bài viết mới</button>
    </a>
    <form action="" method="post" class="mb-2 col-lg-3">
        <button class="btnExport" href="" name="btnExport" type="submit">Export File</button>
    </form>
</div>
<div class="row mt-4" style="overflow-x: auto; white-space:nowrap;">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="table table-sm">
                <th>STT</th>    
                <th>Tiêu đề</th>
                <th>Tên tác giả</th>
                <!-- <th>Mô tả</th> -->
                <!-- <th>Nội dung</th> -->
                <th>thumbnail</th>
                <th>Tag bài viết</th>
                <th>Ngày lập</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $pt = new Posts();
            $results = $pt->getListallposts();
            while ($set = $results->fetch()) :
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $set['articletitle']; ?></td>
                    <td><?php echo $set['articleauthor']; ?></td>
                    <!-- <td><?php echo $set['mota']; ?></td> -->
                    <!-- <td><?php echo $set['content']; ?></td> -->
                    <td><img width="50px" height="50px" src="../Content/imagebaiviet/<?php echo $set['thumbnail']; ?>" /></td>
                    <!-- <td><?php echo $set['tenloai']; ?></td> -->
                    <td><?php
                        $tagbaiviet = explode(',', $set['tag']);
                        foreach ($tagbaiviet as $item) {
                            echo '<span class="badge bg-success mx-1">' . $item . '</span>';
                        }
                        ?></td>
                    <td><?php echo $set['created_at']; ?></td>
                    <td><a class="btn btn-warning" href="index.php?action=posts&act=update&id=<?php echo $set['idposts']; ?>">Edit</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa <?php echo $set['idposts'] . '-' . $set['articletitle'] ?> ?')" href="index.php?action=posts&act=delete&id=<?php echo $set['idposts']; ?>">Delete</a></td>
                    <!-- onclick="return confirm('Bạn có muốn xóa <?php echo $set['id_user'] . '-' . $set['fisrt_name'] ?> ?')" -->
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>