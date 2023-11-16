<?php
session_start();
include 'admin_class.php';

//Creating Admin Object Class
$action = new Admin();

//Downloading Data of file
if(isset($_GET['download_file_id'])){
    $file_id = $_GET['download_file_id'];
    
    $count = $action->downloadCount($file_id);
    
    echo $count;
}

//Deleting Data of file
if(isset($_GET['delete_file_id'])){
    $file_id = $_GET['delete_file_id'];

    $action->deleteFile($file_id);
}

?>