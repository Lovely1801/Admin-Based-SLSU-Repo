<?php
include 'user_class.php';

$action = new User();
if(isset($_GET['file'])){
    $file_id = $_GET['file'];
    $action->downloadFile($file_id);
}

?>