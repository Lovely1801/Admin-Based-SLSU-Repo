<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLSU Repository</title>
    <?php include 'header.php';?>
</head>
<body>
    <div class="wrapper">
        <?php include 'navbar.php';?>
        <?php include 'main.php';?>
    </div>
</body>
</html>