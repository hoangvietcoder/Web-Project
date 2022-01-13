<?php
    session_start();
    require_once('dbconnection.php');
    if(isset($_GET['id_user-f']) && isset($_GET['name-f']) && isset($_GET['birthdate-f']) && isset($_GET['phone-f']) && isset($_GET['gender-f'])){
       $id_user = $_GET['id_user-f'];
       $name = $_GET['name-f'];
       $birthdate = $_GET['birthdate-f'];
       $phone = $_GET['phone-f'];
       $gender =$_GET['gender-f'];

       $result = UpdateProfile($id_user,$name,$birthdate,$phone,$gender);
       if($result['code'] == 0){
            echo '<script>
                alert("'.$result['message'].'");
                window.location.replace("profile.php");
            </script>';
        }
        else{
            echo '<script>
                alert("'.$result['error'].'");
                window.location.replace("profile.php");
            </script>';
        }
    }
    else{
        header('Location: profile.php');
    }
?>