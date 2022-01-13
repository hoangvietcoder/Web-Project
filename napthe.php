<?php
    session_start();
    require_once('dbconnection.php');

    if(isset($_GET['email-f']) && isset($_GET['seri-f'])){
        $email = $_GET['email-f'];
        $seri = $_GET['seri-f'];

        $result = NapThe($email, $seri);
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
