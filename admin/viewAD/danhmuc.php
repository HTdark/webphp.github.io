<div class="midAD"> 
    <h2 style="text-align: center;">Loại Sản Phẩm</h2>
    <button onclick="openDialog()" class="btnDialog">Thêm mới</button>

<div id="overlay">
    <div id="dialog">
        <span id="close-btn" onclick="closeDialog()">&times;</span>
        <h2 style="text-align: center;">Thêm Mới Danh Mục</h2>
        <br>
        <label for="text">TÊN SẢN PHẨM:</label>
        <form action="indexAD.php?act=adddm" method="post">
        <input type="text" name="tendm" id="">
        <input type="submit" name="themmoi" value="Thêm Mới">
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

<style>
    .btnDialog{
        background-color: beige;
        align-items: center;
       
    }
    #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

#dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);

}

#close-btn {
    
    cursor: pointer;
    float: right;
    font-size: 20px;
}
</style>
