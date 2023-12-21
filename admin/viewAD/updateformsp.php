<div class="midAD">
    <h2>Cập Nhật </h2>

    <?php
    if (isset($kqone) && is_array($kqone) && count($kqone) > 0) {
    ?>
        <form action="indexAD.php?act=updateformsp" method="post" enctype="multipart/form-data">
            <select name="iddm" id="">
                <option value="0">Chọn danh mục</option>
                <?php
                $iddmcur = $kqone[0]['iddm'];
                if (isset($dsdm)) {
                    foreach ($dsdm as $dm) {
                        if ($dm['id'] == $iddmcur)
                            echo '<option value="' . $dm['id'] . '" selected>' . $dm['tendm'] . '</option>';
                        else
                            echo '<option value="' . $dm['id'] . '" >' . $dm['tendm'] . '</option>';
                    }
                }
                ?>
            </select>
            <input type="text" name="tensp" id="" value="<?= $kqone[0]['tensp'] ?>">
            <input type="file" name="hinh" id="">
            <img src="<?= $kqone[0]['img'] ?>" width="80px" alt="">
            <?php
            if (isset($uploadOk) && ($uploadOk == 0)) {
                echo "Xin lỗi, chỉ có JPG, JPEG, PNG & GIF files được cho phép,vui lòng chọn lại!";
            }
            ?>

            <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
            <input type="text" name="mota" id="" value="<?= $kqone[0]['mota'] ?>">
            <input type="text" name="gia" id="" value="<?= $kqone[0]['gia'] ?>">
            <input type="hidden" name="id" value="<?= $kqone[0]['id'] ?>">
            <input type="submit" name="capnhat" value="Cập Nhật">
        </form>
        <br>
        <table class="tbSP">
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình ảnh</th>
                <th>mô tả</th>
                <th>Giá</th>
                <th>Hành Động</th>
            </tr>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $sp) {
                    echo ' <tr>
                    <td>' . $i . '</td>
                    <td>' . $sp['tensp'] . '</td>
                    <td>' . $sp['img'] . '</td>
                    <td>' . $sp['mota'] . '</td>
                    <td>' . $sp['gia'] . '</td>
                    <td><a href="indexAD.php?act=updateformsp&id=' . $sp['id'] . '">Sửa</a> |<a href="indexAD.php?act=delsp&id=' . $sp['id'] . '">Xóa</a> </td>
                </tr>';
                    $i++;
                }
            }
            ?>
        </table>
    <?php
    } 
    ?>
</div>
