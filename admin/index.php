<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="wrapper">
        <?php include 'topbar.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php include 'main.php';?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>