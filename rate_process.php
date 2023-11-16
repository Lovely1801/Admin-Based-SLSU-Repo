<?php
session_start();
include 'user_class.php';

$action = new User();
if(isset($_POST['submit'])){
    $file_id = $_POST['file_id'];

    $action->rateFile($file_id);
}


?>