<?php
    require_once('dbconnection.php');
    if(isset($_REQUEST["file"]) && isset($_GET['id_product'])){
        // Get parameters
        $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
        $id_product = $_GET['id_product'];
        
        // Process download
        if(file_exists($file)) {
            UpdateDownloadCount($id_product);

            header('Content-Description: File Transfer');
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            
            flush(); // Flush system output buffer
            readfile($filepath);
            exit;
        }
    }
?>