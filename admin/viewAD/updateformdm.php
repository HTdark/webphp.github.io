<div class="midAD">
    <h2>Cập Nhật Danh mục</h2>

    <form action="indexAD.php?act=updateformdm" method="post">
        <input type="text" name="tendm" id="" value="<?=$kqone[0]['tendm']?>">
        <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
        <input type="submit" name="capnhat" value="Cập Nhật">
    </form>
    <br>
    <table class="tbDM">
        <tr>
            <th>STT</th>
            <th>Tên Danh Mục</th>
           
            <th>Hiển Thị</th>
            <th>Hành Động</th>
        </tr>
        <?php
        if (isset($kq) && (count($kq) > 0)) {
            $i = 1;
            foreach ($kq as $dm) {
                echo ' <tr>
                <td>' . $i . '</td>
                <td>' . $dm['tendm'] . '</td>
                
                <td>' . $dm['hienthi'] . '</td>
                <td><a href="indexAD.php?act=updateformdm&id=' . $dm['id'] . '">Sửa</a>  </td>
            </tr>';
                $i++;
            }
        }
        ?>

    </table>
</div>