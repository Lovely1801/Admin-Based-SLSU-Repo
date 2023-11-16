<?php
include '../conn.php';
session_start();
$id_num = $_SESSION['admin_id'];
$qry = "SELECT * FROM `info` WHERE id_num = '$id_num' AND `status` = 'admin'";
$result = $conn->query($qry);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $qry = $conn->query("INSERT INTO activity_logs (logs, user_id) VALUES ('".$row['name']." is logging out', '".$row['id']."')");
    if($qry){
        session_destroy();
        header('location: login.php');
        exit();
    }
}
?>