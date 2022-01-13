<?php
    session_start();
    require_once('../dbconnection.php');
    if(isset($_GET['id_product']) && isset($_GET['password']) && isset($_GET['id_user'])){
        $id_product = $_GET['id_product'];
        $password = $_GET['password'];
        $id_user = $_GET['id_user'];
    }

    $checker = GetUserProfileById($id_user);

    if(strlen(trim($_GET['password'])) == 0 || !password_verify($password,$checker['password'])){
        $message = "Mật khẩu không hợp lệ, vui lòng thử lại.";
        echo "
            <script>
                window.location.replace('developer.php?select=upload_product&id_delete=".$id_product."&message=".$message."');
            </script>
        ";    
    }
    
    $result = DeleteProductById($id_product);
    $message = $result['message'];    
    echo "
        <script>
            window.location.replace('developer.php?select=upload_product&message=".$message."');
        </script>
        ";
    
?>