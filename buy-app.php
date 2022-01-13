<?php
    session_start();
    require_once('dbconnection.php');
    if(isset($_GET['id_user']) && isset($_GET['id_product']) && isset($_GET['password'])){
        $id_user = $_GET['id_user'];
        $id_product = $_GET['id_product'];
        $password = $_GET['password'];

        if(!password_verify($password, GetUserProfileById($id_user)['password'])){
            echo "<script>
                alert('Mật khẩu không chính xác');
                window.history.back();
            </script>";
        }
        $result = BuyApp($id_user, $id_product);

        echo "<script>
                alert('".$result['message']."');
                window.history.back();
            </script>";
    }
?>