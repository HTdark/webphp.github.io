<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bestseler</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "header.php";
?>  


<div class="SPHOT"><label class="RainbowText">SẢN PHẨM ĐANG HOT</label></div>
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


<?php
include "foot.php";
?>
</body>
</html>