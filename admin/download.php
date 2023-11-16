<?php
include 'admin_class.php';

$action = new Admin();
if(isset($_GET['file'])){
    $file_id = $_GET['file'];
    $action->downloadFile($file_id);
}

?>