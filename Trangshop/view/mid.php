<!-- Middle: information, danh mục sản phẩm, best seller -->

<!-- Danh mục sản phẩm -->
<div class="SPtittle">
    <h1>Danh mục sản phẩm</h1>
</div>
<div class='DanhMucSP'>
    <div class='MucSPContainer'>
        <?php
        $categories = array(
            array("img" => "../img/HinhAnh/hinh ao/hinh1.jpg", "name" => "Áo Phong Cách", "link" => "../../product/sp.php?category=29"),
            array("img" => "../img/HinhAnh/hinh quần/hinhquan (3).jpg", "name" => "Quần Thời Thượng", "link" => "../../product/sp.php?category=30"),
            array("img" => "../img/HinhAnh/hinh túi/hinhtui (4).jpg", "name" => "Túi Xách 'CHẤT!!'", "link" => "../../product/sp.php?category=31"),
            array("img" => "../img/HinhAnh/hinhvo/hinhvo (5).jpg", "name" => "Vớ Siêu Sao", "link" => "../../product/sp.php?category=32"),
            array("img" => "../img/HinhAnh/hinh ao/hinh3.jpg", "name" => "Áo Thun Thoáng mát", "link" => "../../product/sp.php?category=29")
        );

        foreach ($categories as $category) {
            echo "<div class='MucSPItem'>";
            echo "<a href='" . $category["link"] . "' style='text-decoration: none;'>";
            echo "<div class='MucSP'>";
            echo "<img src='" . $category["img"] . "' alt='Product Image'>";
            echo "</div>";
            echo "<p style='text-align: center; font-weight: bold; '>" . $category["name"] . "</p>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>




<div class="SPtittle">
    <h1>SẢN PHẨM ĐANG HOT</h1>
</div>

<div class="SPcontainer">
    <?php
    // Sample data for hot products
    $hotProducts = array(
        array("img" => "../img/HinhAnh/hinh ao/hinh1.jpg", "name" => "Áo 1", "gia" => "100.000đ"),
        array("img" => "../img/HinhAnh/hinh ao/hinh1.jpg", "name" => "Áo 1", "gia" => "100.000đ"),
        array("img" => "../img/HinhAnh/hinh ao/hinh1.jpg", "name" => "Áo 1", "gia" => "100.000đ"),
        array("img" => "../img/HinhAnh/hinh ao/hinh1.jpg", "name" => "Áo 1", "gia" => "100.000đ"),
      
        // Add more products as needed
    );

    foreach ($hotProducts as $product) {
        echo "<form method='post' action='../../product/ttsp.php?id=84'>";
        echo "<div class='SPhcn'>";
        echo "<img src='" . $product["img"] . "' alt='Product Image' class='SPhcnimg'>";
        echo "<h2 class='SPtxt'>" . $product["name"] . "</h2>";
        echo "<p class='SPgia'>" . $product["gia"] . "</p>";
        echo "<input type='hidden' name='id' value='84'>";
        echo "<input type='hidden' name='img' value='" . $product["img"] . "'>";
        echo "<input type='hidden' name='name' value='" . $product["name"] . "'>";
        echo "<input type='hidden' name='gia' value='" . $product["gia"] . "'>";
        echo "<input type='submit' name='addtocart' value='Xem Thông tin sản phẩm'>";
        echo "</div>";
        echo "</form>";
    }
    ?>
</div>
