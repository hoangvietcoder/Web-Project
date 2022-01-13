<?php
    session_start();
    require_once('../dbconnection.php');
    if(isset($_GET['id_product']) && isset($_GET['state'])){
        $id_product = $_GET['id_product'];
        $state = $_GET['state'];
    }
    else{
        echo "
            <script>window.location='developer.php?select=developer';</script>;
        ";
    }

    $result = UpdateProductState($id_product, $state);
    echo "
            <script>window.history.back();</script>;
        ";
?>