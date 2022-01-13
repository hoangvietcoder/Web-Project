<?php
    session_start();
    session_destroy();
    echo "
    <script>
        window.location.replace('trang-chu.php');
    </script>";
    exit;
?>