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

if(isset($_GET['data_id'])){
    $user_id = $_GET['data_id'];

    $data = $action->getUser($user_id);
    $logs = $action->getUserLogs($user_id);

    $arr = array( 'data' => $data, 'logs' => $logs);

    echo json_encode($arr);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    extract($_POST);

    echo $user_id;
    // $result = $action->updateProfImage($base64_image, $user_id);
    // // Save $base64_image to your database as needed
    // if($result == 1){
    //     echo "Image uploaded successfully!";
    // }
}
if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];

    $data = $action->getUserLogs($user_id);

    echo json_encode($data);
}
?>