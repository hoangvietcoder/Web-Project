<?php
    session_start();
    require_once('../dbconnection.php');
    if(isset($_GET['id_info']) && isset($_GET['password']) && isset($_GET['id_user'])){
        $id_info = $_GET['id_info'];
        $password = $_GET['password'];
        $id_user = $_GET['id_user'];
    }

    $checker = GetUserProfileById($id_user);

    if(strlen(trim($_GET['password'])) == 0 || !password_verify($password,$checker['password'])){
        $message = "Mật khẩu không hợp lệ, vui lòng thử lại.";
        echo "
            <script>
                window.location.replace('developer.php?select=quanlytaikhoan&id_delete=".$id_info."&message=".$message."');
            </script>
        ";    
    }
    
    $result = DeleteUserById($id_info);
    $message = $result['message'];    
    echo "
        <script>
            window.location.replace('developer.php?select=quanlytaikhoan&message=".$message."');
        </script>
        ";
    
?>