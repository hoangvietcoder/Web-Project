<?php
    session_start();
    require_once('dbconnection.php');
    if(isset($_GET['id_user']) && isset($_GET['password']) && isset($_GET['npassword'])){
        $id_user = $_GET['id_user'];
        $password = $_GET['password'];
        $npassword = $_GET['npassword'];

        $result = UpdatePassword($id_user, $password, $npassword);
        if($result['code'] == 0){
            echo '<script>
                alert("'.$result['message'].'")
                window.location.replace("profile.php");
            </script>';
        }
        else{
            echo '<script>
                alert("'.$result['message'].'")
                window.location.replace("profile.php");
            </script>';
        }
    }
    else{
        header('Location: profile.php');
    }
?>