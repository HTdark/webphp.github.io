<?php
$connection = mysqli_connect('localhost', 'root', '', 'shopphp');

if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>