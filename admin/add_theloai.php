<?php
require_once('../dbconnection.php');
if (isset($_POST['add']) && $_POST['tentheloai'] != '') {
    $tentheloai = $_POST["tentheloai"];
    $sql = "INSERT INTO `theloai`(`tentheloai`) VALUES ('$tentheloai')";
    mysqli_query(OPEN_DB(), $sql);

    echo "<script> alert('Thêm thể loại thành công!') </script>";
    header("location:./admin.php?select=quanlytheloai");
} else {
    echo "<script> alert('Thêm thể loại thất bại!') </script>";
    header("location:./admin.php?select=quanlytheloai");
}
?>