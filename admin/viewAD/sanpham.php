<link rel="stylesheet" href="styleAD.css">
<div class="midAD">

    <h2>Loại sản phẩm</h2>
    <button onclick="openDialog()" class="btnDialog">Thêm mới</button>

    <div id="overlay">
        <div id="dialog">
            <span id="close-btn" onclick="closeDialog()">&times;</span>
            <h2 style="text-align: center;">THÊM MỚI SẢN PHẨM</h2>

            <form action="indexAD.php?act=addsp" method="post" enctype="multipart/form-data">
                <select name="iddm" id="" class="digText">
                    <option value="0">Chọn danh mục</option>
                    <br>
                    <?php
                    if (isset($dsdm)) {
                        foreach ($dsdm as $dm) {
                            echo ' <option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <br>
                <label for="text" class="digText">Tên sản phẩm:</label>
                <br>
                <input type="text" name="tensp" id="">
                <br>
                <label for="text" class="digText">Chọn ảnh sản phẩm:</label>
                <br>
                <input type="file" name="hinh" id="" class="digText">
                <?php
                if (isset($uploadOk) && ($uploadOk == 0)) {
                    echo "Xin lỗi, chỉ có JPG, JPEG, PNG & GIF files được cho phép,vui lòng chọn lại!";
                }
                ?>
                <br>
                <br>
                <label for="text" class="digText">Giá sản phẩm:</label>
                <br>
                <input type="text" name="gia" id="" class="digText">
                <br>
                <br>
                <label for="text" class="digText">Mô tả sản Phẩm:</label>
                <br>
                <textarea name="mota" id="" class="digText"></textarea>
                <br>

                <input type="submit" name="themmoi" value="Thêm Mới" class="digText">
            </form>
        </div>
    </div>

    <script>
        function openDialog() {
            document.getElementById('overlay').style.display = 'block';
        }

        function closeDialog() {
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</div>

<br>
<table class="tbSP">
    <tr>
        <th>STT</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình Ảnh</th>
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
                <td><img src="' . $sp['img'] . '" width="80px"></td>
                <td>' . $sp['mota'] . '</td>
                <td>' . $sp['gia'] . '</td>
                <td><a href="indexAD.php?act=updateformsp&id=' . $sp['id'] . '">Sửa</a> |<a href="indexAD.php?act=delsp&id=' . $sp['id'] . '">Xóa</a> </td>
            </tr>';
            $i++;
        }
    }
    ?>

</table>
</div>