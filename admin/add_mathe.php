<?php
require_once('../dbconnection.php');

if (isset($_POST['add']) && $_POST['menhgia'] != '' && $_POST['seri'] != '' && $_POST['trangthai'] != '' ) {
    $menhgia = $_POST["menhgia"];
    $seri = $_POST["seri"];
    $trangthai = $_POST["trangthai"];
   
    $sql = "INSERT INTO `thecao`(`menhgia`, `seri`, `trangthai`) VALUES ('$menhgia', '$seri', '$trangthai')";
    mysqli_query(OPEN_DB(), $sql);

    echo "<script> alert('Thêm mã thẻ nạp thành công!') </script>";
    header("location:./admin.php?select=quanlymathe");
} else {
    echo "<script> alert('Thêm mã thẻ nạp thất bại!') </script>";
    header("location:./admin.php?select=quanlymathe");
}
?>